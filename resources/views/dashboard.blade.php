@extends('layouts.app')

@section('title', 'Dashboard')

@section('style')
    <style>
        main {
            padding-top: 2rem !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-soft: #EEF2FF;
            --green: #16A34A; --green-soft: #F0FDF4; --green-bd: #BBF7D0;
            --red: #DC2626;   --red-soft: #FEF2F2;   --red-bd: #FECACA;
            --amber: #D97706; --amber-soft: #FFFBEB; --amber-bd: #FDE68A;
            --cyan: #0891B2;  --cyan-soft: #ECFEFF;  --cyan-bd: #A5F3FC;
            --text: #111827; --muted: #6B7280; --border: #E5E7EB;
            --surface: #F9FAFB; --white-new: #FFFFFF;
            --font: 'Plus Jakarta Sans', sans-serif;
            --radius: 12px;
        }

        /* ── Content ── */
        /* .content { padding: 24px 28px; flex: 1; overflow-y: auto; } */

        /* ── Period tabs ── */
        .ptabs { display: flex; gap: 2px; background: #F3F4F6; border-radius: 9px; padding: 3px; width: fit-content; margin-bottom: 22px; }
        .ptab { padding: 5px 14px; border-radius: 7px; font-size: 12px; font-weight: 500; color: var(--muted); cursor: pointer; }
        .ptab.active { background: var(--white-new); color: var(--text); box-shadow: 0 1px 3px rgba(0,0,0,.08); }

        /* ── Stat Cards ── */
        .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 22px; }
        .stat-card { background: var(--white-new); border: 1px solid var(--border); border-radius: var(--radius); padding: 18px 20px; }
        .sc-icon { width: 38px; height: 38px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 18px; margin-bottom: 14px; }
        .sc-label { font-size: 12px; font-weight: 500; color: var(--muted); margin-bottom: 5px; }
        .sc-value { font-size: 24px; font-weight: 700; letter-spacing: -.5px; line-height: 1; }
        .sc-foot { margin-top: 10px; font-size: 11px; color: var(--muted); display: flex; align-items: center; gap: 5px; }
        .tag-up   { color: var(--green); background: var(--green-soft); font-size: 11px; font-weight: 600; padding: 2px 6px; border-radius: 5px; }
        .tag-dn   { color: var(--red);   background: var(--red-soft);   font-size: 11px; font-weight: 600; padding: 2px 6px; border-radius: 5px; }
        .tag-neu  { color: var(--amber); background: var(--amber-soft); font-size: 11px; font-weight: 600; padding: 2px 6px; border-radius: 5px; }

        .i-green { background: var(--green-soft); color: var(--green); }
        .i-red   { background: var(--red-soft);   color: var(--red);   }
        .i-blue  { background: var(--primary-soft); color: var(--primary); }
        .i-amber { background: var(--amber-soft); color: var(--amber); }
        .i-cyan  { background: var(--cyan-soft);  color: var(--cyan);  }

        /* ── Card box ── */
        .card { background: var(--white-new); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; }
        .card-head { display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid var(--border); }
        .card-title { font-size: 13px; font-weight: 600; }
        .card-act { font-size: 12px; color: var(--primary); cursor: pointer; display: flex; align-items: center; gap: 3px; }
        .card-body { padding: 20px; }

        /* ── Grid rows ── */
        .row-2-1 { display: grid; grid-template-columns: 2fr 1fr; gap: 16px; margin-bottom: 22px; }
        .row-3   { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 22px; }
        .row-tbl { display: grid; grid-template-columns: 3fr 2fr; gap: 16px; margin-bottom: 22px; }

        /* ── Tables ── */
        table { width: 100%; border-collapse: collapse; }
        thead th { padding: 9px 16px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .7px; color: var(--muted); background: var(--surface); border-bottom: 1px solid var(--border); text-align: left; white-space: nowrap; }
        tbody td { padding: 11px 16px; font-size: 13px; border-bottom: 1px solid var(--border); color: var(--text); }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #FAFAFA; }

        /* ── Badges ── */
        .badge { display: inline-flex; align-items: center; gap: 4px; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 5px; }
        .badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; }
        .b-paid    { background: var(--green-soft); color: var(--green); } .b-paid::before    { background: var(--green); }
        .b-pending { background: var(--amber-soft); color: var(--amber); } .b-pending::before { background: var(--amber); }
        .b-failed  { background: var(--red-soft);   color: var(--red);   } .b-failed::before  { background: var(--red);   }

        /* ── Source rows ── */
        .src-row { display: flex; align-items: center; gap: 12px; padding: 11px 20px; border-bottom: 1px solid var(--border); }
        .src-row:last-child { border-bottom: none; }
        .src-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .src-pct { margin-left: auto; font-size: 13px; font-weight: 600; }
        .prog { height: 5px; background: #E5E7EB; border-radius: 4px; overflow: hidden; margin-top: 5px; }
        .prog-fill { height: 100%; border-radius: 4px; }
    </style>
    <style>
        /* =========================================
        RESPONSIVE DASHBOARD
        ========================================= */

        /* Large Tablet */
        @media (max-width: 1200px) {

            .stat-grid{
                grid-template-columns: repeat(2,1fr);
            }

            .row-3{
                grid-template-columns: 1fr;
            }

            .row-tbl{
                grid-template-columns: 1fr;
            }
        }

        /* Tablet */
        @media (max-width: 991px) {

            .content{
                padding:15px;
            }

            .row-2-1{
                grid-template-columns: 1fr;
            }

            .stat-grid{
                grid-template-columns: repeat(2,1fr);
                gap:12px;
            }

            .card-body{
                padding:15px;
            }

            .sc-value{
                font-size:20px;
            }

            .card-head{
                flex-wrap:wrap;
                gap:10px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {

            .stat-grid{
                grid-template-columns: 1fr;
                gap:12px;
            }

            .row-2-1,
            .row-3,
            .row-tbl{
                grid-template-columns: 1fr;
                gap:12px;
            }

            .stat-card{
                padding:15px;
            }

            .sc-value{
                font-size:18px;
            }

            .sc-label{
                font-size:11px;
            }

            .card-title{
                font-size:12px;
            }

            .card-head{
                padding:12px 15px;
            }

            .card-body{
                padding:12px;
            }

            /* Chart heights */
            #revenueChart,
            #trafficDonut,
            #orderStatusChart,
            #revenueOrdersChart,
            #quarterlyChart{
                max-height:250px;
            }

            /* Tables */
            .card table{
                min-width:700px;
            }

            .card{
                overflow:hidden;
            }

            .table-responsive{
                overflow-x:auto;
                -webkit-overflow-scrolling:touch;
            }
        }

        /* Small Mobile */
        @media (max-width: 575px){

            .content{
                padding:10px;
            }

            .stat-card{
                padding:12px;
            }

            .sc-icon{
                width:34px;
                height:34px;
                font-size:16px;
            }

            .sc-value{
                font-size:16px;
            }

            .card-head{
                padding:10px 12px;
            }

            .card-body{
                padding:10px;
            }

            .src-row{
                padding:10px 12px;
            }
        }
    </style>
    <style>
        /* Minimalist Version - Clean and Simple */
        .date-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            padding: 0.75rem 0;
        }

        .date-filters .btn {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 2rem;
            transition: all 0.2s;
            cursor: pointer;
        }

        .date-filters .btn-primary {
            background: #000000;
            border: 1px solid #000000;
            color: white;
        }

        .date-filters .btn-primary:hover {
            background: #333333;
            border-color: #333333;
        }

        .date-filters .btn-outline-primary {
            background: transparent;
            border: 1px solid #e5e7eb;
            color: #4b5563;
        }

        .date-filters .btn-outline-primary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            color: #000000;
        }

        /* Custom button specific styling */
        .date-filters .btn-outline-primary:last-child {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }

        .date-filters .btn-outline-primary:last-child:hover {
            background: #f3f4f6;
        }

        /* Custom Date Filter Container */
        #customDateFilter {
            background: #f9fafb;
            border-radius: 1rem;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            border: 1px solid #e5e7eb;
        }

        #customDateFilter .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.5rem 0.75rem;
            background: white;
        }

        #customDateFilter .form-control:focus {
            border-color: #000000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
        }

        #customDateFilter .btn-success {
            background: #000000;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem;
            color: white;
        }

        #customDateFilter .btn-success:hover {
            background: #333333;
        }

        @media (max-width: 768px) {
            .date-filters .btn {
                padding: 0.375rem 1rem;
                font-size: 0.75rem;
            }
        }
    </style>
@endsection


@section('content')


    <div class="content">
        @php
        $currentFilter = request('date_filter', 'today');
        @endphp

        <div class="date-filters mb-3">
            <a href="?date_filter=today"
            class="btn {{ $currentFilter == 'today' ? 'btn-primary' : 'btn-outline-dark' }}">
                Today
            </a>

            <a href="?date_filter=30_days"
            class="btn {{ $currentFilter == '30_days' ? 'btn-primary' : 'btn-outline-dark' }}">
                30 Days
            </a>

            <a href="?date_filter=3_months"
            class="btn {{ $currentFilter == '3_months' ? 'btn-primary' : 'btn-outline-dark' }}">
                3 Months
            </a>

            <a href="?date_filter=6_months"
            class="btn {{ $currentFilter == '6_months' ? 'btn-primary' : 'btn-outline-dark' }}">
                6 Months
            </a>

            <a href="?date_filter=1_year"
            class="btn {{ $currentFilter == '1_year' ? 'btn-primary' : 'btn-outline-dark' }}">
                1 Year
            </a>

            <a href="?date_filter=all_time"
            class="btn {{ $currentFilter == 'all_time' ? 'btn-primary' : 'btn-outline-dark' }}">
                All Time
            </a>

            <button class="btn {{ $currentFilter == 'custom' ? 'btn-primary' : 'btn-outline-dark' }}"
                    data-bs-toggle="collapse"
                    data-bs-target="#customDateFilter">
                Custom
            </button>
        </div>

        <div class="collapse {{ $currentFilter == 'custom' ? 'show' : '' }}"
            id="customDateFilter">
            <form method="GET" class="row g-2">
                <input type="hidden" name="date_filter" value="custom">

                <div class="col-md-4">
                    <input type="date"
                        name="from_date"
                        value="{{ request('from_date') }}"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <input type="date"
                        name="to_date"
                        value="{{ request('to_date') }}"
                        class="form-control">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">
                        Apply
                    </button>
                </div>
            </form>
        </div>

      {{-- ── Row 1: Stats ── --}}
      <div class="stat-grid">
        <div class="stat-card">
          <div class="sc-icon i-green"><i class="ti ti-currency-rupee"></i></div>
          <div class="sc-label">Total Revenue</div>
          <div class="sc-value">₹{{ number_format($totalRevenue ?? 0, 2) }}</div>
          <div class="sc-foot"><span class="tag-up">All time</span> paid orders</div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-blue"><i class="ti ti-shopping-bag"></i></div>
          <div class="sc-label">Total Orders</div>
          <div class="sc-value">{{ number_format($totalOrders ?? 0) }}</div>
          <div class="sc-foot">All statuses</div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-cyan"><i class="ti ti-circle-check"></i></div>
          <div class="sc-label">Successful Payments</div>
          <div class="sc-value">{{ number_format($paidOrders ?? 0) }}</div>
          <div class="sc-foot">
            @if(($totalOrders ?? 0) > 0)
              <span class="tag-up">{{ round(($paidOrders / $totalOrders) * 100, 1) }}%</span> success rate
            @else
              <span class="tag-neu">—</span> no orders yet
            @endif
          </div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-red"><i class="ti ti-circle-x"></i></div>
          <div class="sc-label">Failed Payments</div>
          <div class="sc-value">{{ number_format($failedOrders ?? 0) }}</div>
          <div class="sc-foot">
            @if(($totalOrders ?? 0) > 0)
              <span class="tag-dn">{{ round(($failedOrders / $totalOrders) * 100, 1) }}%</span> failure rate
            @else
              <span class="tag-neu">—</span> no failures
            @endif
          </div>
        </div>
      </div>

      {{-- ── Row 2: Stats ── --}}
      <div class="stat-grid">
        <div class="stat-card">
          <div class="sc-icon i-blue"><i class="ti ti-users"></i></div>
          <div class="sc-label">Total Visitors</div>
          <div class="sc-value">{{ number_format($uniqueVisitors ?? 0) }}</div>
          <div class="sc-foot">Tracked visits</div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-cyan"><i class="ti ti-download"></i></div>
          <div class="sc-label">Downloads</div>
          <div class="sc-value">{{ number_format($totalDownloads ?? 0) }}</div>
          <div class="sc-foot">Equals paid orders</div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-amber"><i class="ti ti-percentage"></i></div>
          <div class="sc-label">Conversion Rate</div>
          <div class="sc-value">{{ $conversionRate ?? 0 }}%</div>
          <div class="sc-foot">Visitors → paid</div>
        </div>
        <div class="stat-card">
          <div class="sc-icon i-green"><i class="ti ti-calendar-stats"></i></div>
          <div class="sc-label">Today's Revenue</div>
          <div class="sc-value">₹{{ number_format($todayRevenue ?? 0, 2) }}</div>
          <div class="sc-foot">Paid orders today</div>
        </div>
      </div>

      {{-- ── Charts Row 1: Revenue area + Traffic donut ── --}}
      <div class="row-1">

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-chart-area" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Monthly Revenue — {{ now()->year }}</span>
            {{-- <span class="card-act"><i class="ti ti-download" style="font-size:13px"></i> Export</span> --}}
          </div>
          <div class="card-body">
            <div style="position:relative;height:260px">
              <canvas id="revenueChart" role="img" aria-label="Area chart of monthly revenue for {{ now()->year }}">Monthly revenue chart.</canvas>
            </div>
          </div>
        </div>

        {{-- <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-chart-donut" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Traffic Sources</span>
          </div>
          <div style="padding:16px 20px 4px">
            <div style="position:relative;height:170px">
              <canvas id="trafficDonut" role="img" aria-label="Donut chart of traffic: Facebook 44%, Instagram 28%, Google 15%, Direct 13%">Facebook 44%, Instagram 28%, Google 15%, Direct 13%.</canvas>
            </div>
          </div>
          <div class="src-row">
            <div class="src-icon i-blue"><i class="ti ti-brand-facebook"></i></div>
            <div style="flex:1"><div style="font-size:13px;font-weight:500">Facebook</div><div class="prog"><div class="prog-fill" style="width:44%;background:#4F46E5"></div></div></div>
            <div class="src-pct" style="color:var(--primary)">44%</div>
          </div>
          <div class="src-row">
            <div class="src-icon i-red"><i class="ti ti-brand-instagram"></i></div>
            <div style="flex:1"><div style="font-size:13px;font-weight:500">Instagram</div><div class="prog"><div class="prog-fill" style="width:28%;background:var(--red)"></div></div></div>
            <div class="src-pct" style="color:var(--red)">28%</div>
          </div>
          <div class="src-row">
            <div class="src-icon i-cyan"><i class="ti ti-brand-google"></i></div>
            <div style="flex:1"><div style="font-size:13px;font-weight:500">Google</div><div class="prog"><div class="prog-fill" style="width:15%;background:var(--cyan)"></div></div></div>
            <div class="src-pct" style="color:var(--cyan)">15%</div>
          </div>
          <div class="src-row">
            <div class="src-icon i-green"><i class="ti ti-cursor-text"></i></div>
            <div style="flex:1"><div style="font-size:13px;font-weight:500">Direct</div><div class="prog"><div class="prog-fill" style="width:13%;background:var(--green)"></div></div></div>
            <div class="src-pct" style="color:var(--green)">13%</div>
          </div>
        </div> --}}

      </div>

      {{-- ── Charts Row 2: Order status + Revenue vs Orders + Quarterly pie ── --}}
      <div class="row-3">

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-chart-bar" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Order Status</span>
          </div>
          <div class="card-body">
            <div style="position:relative;height:200px">
              <canvas id="orderStatusChart" role="img" aria-label="Bar chart of order statuses">
                Paid: {{ $paidOrders }}, Pending: {{ $totalOrders - $paidOrders - $failedOrders }}, Failed: {{ $failedOrders }}.
              </canvas>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-chart-histogram" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Revenue vs Orders</span>
          </div>
          <div class="card-body">
            <div style="position:relative;height:200px">
              <canvas id="revenueOrdersChart" role="img" aria-label="Dual axis chart comparing monthly revenue and order estimates">Revenue and orders comparison.</canvas>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-chart-pie" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Quarterly Revenue</span>
          </div>
          <div class="card-body">
            <div style="position:relative;height:200px">
              <canvas id="quarterlyChart" role="img" aria-label="Pie chart of quarterly revenue breakdown">Quarterly revenue distribution.</canvas>
            </div>
          </div>
        </div>

      </div>

      {{-- ── Tables ── --}}
      <div class="row-tbl">

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-list" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Recent Orders</span>
            {{-- <span class="card-act">View all <i class="ti ti-arrow-right" style="font-size:12px"></i></span> --}}
          </div>
          <table>
            <thead>
              <tr>
                <th>Order #</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentOrders ?? [] as $order)
              <tr>
                <td style="font-weight:600;color:#374151">{{ $order->order_number }}</td>
                <td style="font-weight:500">₹{{ number_format($order->amount, 2) }}</td>
                <td>
                  @if($order->payment_status === 'paid')
                    <span class="badge b-paid">Paid</span>
                  @elseif($order->payment_status === 'pending')
                    <span class="badge b-pending">Pending</span>
                  @else
                    <span class="badge b-failed">Failed</span>
                  @endif
                </td>
                <td style="color:var(--muted);font-size:12px">
                  {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A') }}
                </td>
              </tr>
              @empty
              <tr><td colspan="4" style="text-align:center;padding:28px;color:var(--muted)">No orders found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="card">
          <div class="card-head">
            <span class="card-title"><i class="ti ti-world" style="font-size:15px;vertical-align:-2px;margin-right:5px;color:var(--primary)"></i>Latest Visitors</span>
            {{-- <span class="card-act">View all <i class="ti ti-arrow-right" style="font-size:12px"></i></span> --}}
          </div>
          <table>
            <thead>
              <tr>
                <th>IP Address</th>
                <th>Page</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentVisitors ?? [] as $visitor)
              <tr>
                <td style="font-size:12px;font-weight:500;font-family:monospace">{{ $visitor->ip }}</td>
                <td style="font-size:12px;color:var(--muted)">{{ $visitor->page }}</td>
                <td style="font-size:12px;color:var(--muted)">{{ \Carbon\Carbon::parse($visitor->created_at)->diffForHumans() }}</td>
              </tr>
              @empty
              <tr><td colspan="3" style="text-align:center;padding:28px;color:var(--muted)">No visitor data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>

    </div>{{-- /content --}}

@endsection


@section('script')
<script>
document.getElementById('customRangeBtn').addEventListener('click', function () {
    const box = document.getElementById('customRangeBox');
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
const chartRevenue  = @json($chartRevenue);
const totalOrders   = {{ $totalOrders  ?? 0 }};
const paidOrders    = {{ $paidOrders   ?? 0 }};
const failedOrders  = {{ $failedOrders ?? 0 }};
const pendingOrders = Math.max(0, totalOrders - paidOrders - failedOrders);
const months        = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
Chart.defaults.font.size   = 12;
Chart.defaults.color       = '#6B7280';

const gridColor = '#F3F4F6';
const rupee = v => '₹' + Number(v).toLocaleString('en-IN');

/* 1 ── Monthly Revenue area */
new Chart(document.getElementById('revenueChart'), {
  type: 'line',
  data: {
    labels: months,
    datasets: [{
      label: 'Revenue',
      data: chartRevenue,
      borderColor: '#4F46E5',
      backgroundColor: 'rgba(79,70,229,0.07)',
      fill: true, tension: 0.4,
      pointBackgroundColor: '#4F46E5',
      pointRadius: 4, pointHoverRadius: 6, borderWidth: 2
    }]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: {
      legend: { display: false },
      tooltip: { callbacks: { label: ctx => ' ' + rupee(ctx.parsed.y) } }
    },
    scales: {
      x: { grid: { color: gridColor }, ticks: { autoSkip: false, maxRotation: 0 } },
      y: { grid: { color: gridColor }, beginAtZero: true,
           ticks: { callback: v => '₹' + (v >= 1000 ? Math.round(v/1000)+'k' : v) } }
    }
  }
});

/* 2 ── Traffic donut */
new Chart(document.getElementById('trafficDonut'), {
  type: 'doughnut',
  data: {
    labels: ['Facebook','Instagram','Google','Direct'],
    datasets: [{ data: [44,28,15,13],
      backgroundColor: ['#4F46E5','#DC2626','#0891B2','#16A34A'],
      borderWidth: 2, borderColor: '#fff', hoverOffset: 4 }]
  },
  options: {
    responsive: true, maintainAspectRatio: false, cutout: '68%',
    plugins: {
      legend: { display: false },
      tooltip: { callbacks: { label: ctx => ' ' + ctx.label + ': ' + ctx.parsed + '%' } }
    }
  }
});

/* 3 ── Order status bar */
new Chart(document.getElementById('orderStatusChart'), {
  type: 'bar',
  data: {
    labels: ['Paid','Pending','Failed'],
    datasets: [{
      label: 'Orders',
      data: [paidOrders, pendingOrders, failedOrders],
      backgroundColor: ['rgba(22,163,74,0.12)','rgba(217,119,6,0.12)','rgba(220,38,38,0.12)'],
      borderColor:     ['#16A34A','#D97706','#DC2626'],
      borderWidth: 2, borderRadius: 6, borderSkipped: false
    }]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: { legend: { display: false } },
    scales: {
      x: { grid: { display: false } },
      y: { grid: { color: gridColor }, beginAtZero: true, ticks: { stepSize: 1 } }
    }
  }
});

/* 4 ── Revenue vs Orders dual-axis */
const maxRev = Math.max(...chartRevenue, 1);
const estOrders = chartRevenue.map(v => v > 0
  ? Math.max(1, Math.round(v / maxRev * (paidOrders / 12)))
  : 0);

new Chart(document.getElementById('revenueOrdersChart'), {
  type: 'bar',
  data: {
    labels: months,
    datasets: [
      { label: 'Revenue (₹)', data: chartRevenue,
        backgroundColor: 'rgba(79,70,229,0.12)', borderColor: '#4F46E5',
        borderWidth: 2, borderRadius: 4, yAxisID: 'y' },
      { label: 'Orders', data: estOrders, type: 'line',
        borderColor: '#0891B2', backgroundColor: 'transparent',
        tension: 0.4, pointRadius: 3, borderWidth: 2, yAxisID: 'y2' }
    ]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: {
      legend: { position: 'top', labels: { boxWidth: 10, boxHeight: 10, useBorderRadius: true, borderRadius: 2, padding: 14, font: { size: 11 } } }
    },
    scales: {
      x: { grid: { display: false }, ticks: { autoSkip: true, maxRotation: 0 } },
      y:  { position: 'left',  grid: { color: gridColor }, beginAtZero: true,
             ticks: { callback: v => '₹' + Math.round(v/1000) + 'k' } },
      y2: { position: 'right', grid: { display: false }, beginAtZero: true, ticks: { stepSize: 1 } }
    }
  }
});

/* 5 ── Quarterly pie */
const q = [0,0,0,0];
chartRevenue.forEach((v,i) => { q[Math.floor(i/3)] += v; });

new Chart(document.getElementById('quarterlyChart'), {
  type: 'pie',
  data: {
    labels: ['Q1 Jan–Mar','Q2 Apr–Jun','Q3 Jul–Sep','Q4 Oct–Dec'],
    datasets: [{ data: q.map(v => Math.round(v * 100) / 100),
      backgroundColor: ['rgba(79,70,229,.8)','rgba(8,145,178,.8)','rgba(22,163,74,.8)','rgba(217,119,6,.8)'],
      borderWidth: 2, borderColor: '#fff', hoverOffset: 6 }]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: {
      legend: { position: 'bottom', labels: { boxWidth: 10, boxHeight: 10, useBorderRadius: true, borderRadius: 2, padding: 10, font: { size: 11 } } },
      tooltip: { callbacks: { label: ctx => ' ' + rupee(ctx.parsed) } }
    }
  }
});

/* Period tab interaction */
document.querySelectorAll('.ptab').forEach(t => {
  t.addEventListener('click', function() {
    document.querySelectorAll('.ptab').forEach(x => x.classList.remove('active'));
    this.classList.add('active');
  });
});

/* Sidebar nav interaction */
document.querySelectorAll('.s-link').forEach(t => {
  t.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelectorAll('.s-link').forEach(x => x.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>
@endsection