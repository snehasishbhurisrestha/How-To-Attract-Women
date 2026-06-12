<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*public function index()
    {
        // Auto mark old pending orders as failed
        Order::where('payment_status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subMinutes(10))
            ->update([
                'payment_status' => 'failed'
            ]);


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
    }*/

    public function index(Request $request)
    {
        // Auto mark old pending orders as failed
        Order::where('payment_status', 'pending')
            ->where('created_at', '<=', Carbon::now()->subMinutes(10))
            ->update([
                'payment_status' => 'failed'
            ]);

        // Date Filter
        $filter = $request->get('date_filter', '3_months');

        $orderFilter = Order::query();
        $visitorFilter = Visitor::query();

        switch ($filter) {

            case '30_days':
                $orderFilter->where('created_at', '>=', now()->subDays(30));
                $visitorFilter->where('created_at', '>=', now()->subDays(30));
                break;

            case '3_months':
                $orderFilter->where('created_at', '>=', now()->subMonths(3));
                $visitorFilter->where('created_at', '>=', now()->subMonths(3));
                break;

            case '6_months':
                $orderFilter->where('created_at', '>=', now()->subMonths(6));
                $visitorFilter->where('created_at', '>=', now()->subMonths(6));
                break;

            case '1_year':
                $orderFilter->where('created_at', '>=', now()->subYear());
                $visitorFilter->where('created_at', '>=', now()->subYear());
                break;

            case 'custom':
                if ($request->filled('from_date')) {
                    $orderFilter->whereDate('created_at', '>=', $request->from_date);
                    $visitorFilter->whereDate('created_at', '>=', $request->from_date);
                }

                if ($request->filled('to_date')) {
                    $orderFilter->whereDate('created_at', '<=', $request->to_date);
                    $visitorFilter->whereDate('created_at', '<=', $request->to_date);
                }
                break;

            case 'all_time':
                break;

            default: // Today
                $orderFilter->whereDate('created_at', today());
                $visitorFilter->whereDate('created_at', today());
                break;
        }

        // Revenue
        $totalRevenue = (clone $orderFilter)
            ->where('payment_status', 'paid')
            ->sum('amount');

        $todayRevenue = (clone $orderFilter)
            ->where('payment_status', 'paid')
            ->sum('amount');

        // Orders
        $totalOrders = (clone $orderFilter)->count();

        $paidOrders = (clone $orderFilter)
            ->where('payment_status', 'paid')
            ->count();

        $failedOrders = (clone $orderFilter)
            ->where('payment_status', 'failed')
            ->count();

        // Visitors
        $totalVisitors = (clone $visitorFilter)->count();

        $todayVisitors = (clone $visitorFilter)->count();

        $uniqueVisitors = (clone $visitorFilter)
            ->distinct('ip')
            ->count('ip');

        // Downloads (= paid orders)
        $totalDownloads = $paidOrders;

        // Conversion Rate
        $conversionRate = $totalVisitors > 0
            ? round(($paidOrders / $totalVisitors) * 100, 2)
            : 0;

        // Recent records
        $recentOrders = (clone $orderFilter)
            ->latest()
            ->take(10)
            ->get();

        $recentVisitors = (clone $visitorFilter)
            ->latest()
            ->take(10)
            ->get();

        // Monthly Revenue Chart (Current Year)
        // $chartRevenue = [];
        // for ($month = 1; $month <= 12; $month++) {
        //     $chartRevenue[] = (float) Order::where('payment_status', 'paid')
        //         ->whereYear('created_at', now()->year)
        //         ->whereMonth('created_at', $month)
        //         ->sum('amount');
        // }

        // Revenue Chart Based On Filter
        $chartLabels = [];
        $chartRevenue = [];

        switch ($filter) {

            case 'today':

                for ($hour = 0; $hour < 24; $hour++) {

                    $chartLabels[] = sprintf('%02d:00', $hour);

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereDate('created_at', today())
                        // ->whereHour('created_at', $hour)
                        ->whereRaw('HOUR(created_at) = ?', [$hour])
                        ->sum('amount');
                }

                break;

            case '30_days':

                for ($i = 29; $i >= 0; $i--) {

                    $date = now()->subDays($i);

                    $chartLabels[] = $date->format('d M');

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereDate('created_at', $date->toDateString())
                        ->sum('amount');
                }

                break;

            case '3_months':

                for ($i = 2; $i >= 0; $i--) {

                    $date = now()->subMonths($i);

                    $chartLabels[] = $date->format('M Y');

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->sum('amount');
                }

                break;

            case '6_months':

                for ($i = 5; $i >= 0; $i--) {

                    $date = now()->subMonths($i);

                    $chartLabels[] = $date->format('M Y');

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->sum('amount');
                }

                break;

            case '1_year':

                for ($i = 11; $i >= 0; $i--) {

                    $date = now()->subMonths($i);

                    $chartLabels[] = $date->format('M Y');

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->sum('amount');
                }

                break;

            case 'custom':

                if ($request->filled('from_date') && $request->filled('to_date')) {

                    $from = Carbon::parse($request->from_date);
                    $to   = Carbon::parse($request->to_date);

                    while ($from <= $to) {

                        $chartLabels[] = $from->format('d M');

                        $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                            ->whereDate('created_at', $from->toDateString())
                            ->sum('amount');

                        $from->addDay();
                    }
                }

                break;

            case 'all_time':

                $firstOrder = Order::oldest('created_at')->first();

                if ($firstOrder) {

                    $start = $firstOrder->created_at->copy()->startOfMonth();
                    $end   = now()->copy()->endOfMonth();

                    while ($start <= $end) {

                        $chartLabels[] = $start->format('M Y');

                        $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                            ->whereYear('created_at', $start->year)
                            ->whereMonth('created_at', $start->month)
                            ->sum('amount');

                        $start->addMonth();
                    }
                }

                break;

            default:

                for ($hour = 0; $hour < 24; $hour++) {

                    $chartLabels[] = sprintf('%02d:00', $hour);

                    $chartRevenue[] = (float) Order::where('payment_status', 'paid')
                        ->whereDate('created_at', today())
                        ->whereHour('created_at', $hour)
                        ->sum('amount');
                }

                break;
        }

        // Monthly Visitor Chart (Current Year)
        $chartVisitors = [];
        for ($month = 1; $month <= 12; $month++) {
            $chartVisitors[] = (int) Visitor::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        }

        // Device breakdown
        $deviceStats = (clone $visitorFilter)
            ->selectRaw('device, count(*) as total')
            ->groupBy('device')
            ->pluck('total', 'device')
            ->toArray();

        // Top pages
        $topPages = (clone $visitorFilter)
            ->selectRaw('page, url, count(*) as visits')
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
            // 'chartRevenue',
            'chartLabels',
            'chartRevenue',
            'chartVisitors',
            'deviceStats',
            'topPages',
        ));
    }
}