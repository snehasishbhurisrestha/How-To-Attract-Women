<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ── Revenue ──────────────────────────────────────
        $totalRevenue = Order::where('payment_status', 'paid')->sum('amount');
        $todayRevenue = Order::where('payment_status', 'paid')
            ->whereDate('created_at', today())->sum('amount');

        // ── Orders ───────────────────────────────────────
        $totalOrders  = Order::count();
        $paidOrders   = Order::where('payment_status', 'paid')->count();
        $failedOrders = Order::where('payment_status', 'failed')->count();

        // ── Visitors ─────────────────────────────────────
        $totalVisitors  = Visitor::count();
        $todayVisitors  = Visitor::today()->count();
        $uniqueVisitors = Visitor::distinct('ip')->count('ip');

        // ── Downloads (= paid orders) ─────────────────────
        $totalDownloads = $paidOrders;

        // ── Conversion Rate ───────────────────────────────
        $conversionRate = $totalVisitors > 0
            ? round(($paidOrders / $totalVisitors) * 100, 2)
            : 0;

        // ── Recent records ───────────────────────────────
        $recentOrders   = Order::latest()->take(10)->get();
        $recentVisitors = Visitor::latest()->take(10)->get();

        // ── Monthly Revenue Chart (current year) ─────────
        $chartRevenue = [];
        for ($month = 1; $month <= 12; $month++) {
            $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->sum('amount');
        }

        // ── Monthly Visitor Chart (current year) ──────────
        $chartVisitors = [];
        for ($month = 1; $month <= 12; $month++) {
            $chartVisitors[] = (int) Visitor::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        }

        // ── Device breakdown ─────────────────────────────
        $deviceStats = Visitor::selectRaw('device, count(*) as total')
            ->groupBy('device')
            ->pluck('total', 'device')
            ->toArray();

        // ── Top pages ────────────────────────────────────
        $topPages = Visitor::selectRaw('page, url, count(*) as visits')
            ->groupBy('page', 'url')
            ->orderByDesc('visits')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalRevenue',
            'todayRevenue',
            'totalOrders',
            'paidOrders',
            'failedOrders',
            'totalVisitors',
            'todayVisitors',
            'uniqueVisitors',
            'totalDownloads',
            'conversionRate',
            'recentOrders',
            'recentVisitors',
            'chartRevenue',
            'chartVisitors',
            'deviceStats',
            'topPages',
        ));
    }
}