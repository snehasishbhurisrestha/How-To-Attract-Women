<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Paths that should NOT be tracked.
     */
    private array $excluded = [
        '/dashboard',
        '/_ignition',
        '/livewire',
        '/horizon',
        '/telescope',
        '/sanctum',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests that return HTML (skip AJAX, assets, API)
        if (
            $request->isMethod('GET') &&
            ! $request->ajax() &&
            ! $request->wantsJson() &&
            $this->shouldTrack($request)
        ) {
            $this->record($request);
        }

        return $response;
    }

    private function shouldTrack(Request $request): bool
    {
        $path = '/' . ltrim($request->path(), '/');

        foreach ($this->excluded as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return false;
            }
        }

        return true;
    }

    private function record(Request $request): void
    {
        try {
            $ua       = $request->userAgent() ?? '';
            $parsed   = $this->parseUserAgent($ua);

            Visitor::create([
                'ip'         => $request->ip(),
                'page'       => $this->getPageTitle($request),
                'url'        => '/' . $request->path(),
                'user_agent' => $ua,
                'browser'    => $parsed['browser'],
                'platform'   => $parsed['platform'],
                'device'     => $parsed['device'],
                'referer'    => $request->headers->get('referer'),
                'session_id' => $request->session()->getId(),
                'user_id'    => Auth::id(),
            ]);
        } catch (\Throwable $e) {
            // Never break the app because of tracking failure
            logger()->warning('Visitor tracking failed: ' . $e->getMessage());
        }
    }

    /**
     * Convert the URL path to a human-readable page name.
     * Extend this map to match your own routes.
     */
    private function getPageTitle(Request $request): string
    {
        $map = [
            '/'          => 'Home',
            '/products'  => 'Products',
            '/pricing'   => 'Pricing',
            '/about'     => 'About',
            '/contact'   => 'Contact',
            '/login'     => 'Login',
            '/register'  => 'Register',
            '/checkout'  => 'Checkout',
            '/download'  => 'Download',
        ];

        $path = '/' . ltrim($request->path(), '/');

        return $map[$path] ?? ucfirst(str_replace(['-', '_', '/'], ' ', $request->path()));
    }

    /**
     * Lightweight user-agent parser (no external package needed).
     */
    private function parseUserAgent(string $ua): array
    {
        // Browser
        $browser = match (true) {
            str_contains($ua, 'Edg')     => 'Edge',
            str_contains($ua, 'OPR')     => 'Opera',
            str_contains($ua, 'Chrome')  => 'Chrome',
            str_contains($ua, 'Firefox') => 'Firefox',
            str_contains($ua, 'Safari')  => 'Safari',
            str_contains($ua, 'MSIE') || str_contains($ua, 'Trident') => 'IE',
            default                      => 'Unknown',
        };

        // Platform
        $platform = match (true) {
            str_contains($ua, 'Windows')    => 'Windows',
            str_contains($ua, 'Mac OS')     => 'Mac',
            str_contains($ua, 'Linux')      => 'Linux',
            str_contains($ua, 'Android')    => 'Android',
            str_contains($ua, 'iPhone') || str_contains($ua, 'iPad') => 'iOS',
            default                         => 'Unknown',
        };

        // Device
        $device = match (true) {
            str_contains($ua, 'Mobi') || str_contains($ua, 'Android') => 'mobile',
            str_contains($ua, 'iPad') || str_contains($ua, 'Tablet')  => 'tablet',
            default                                                     => 'desktop',
        };

        return compact('browser', 'platform', 'device');
    }
}