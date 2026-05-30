@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row g-3 mb-4">
    @foreach([
        ['Total Orders Today', $stats['ordersToday'], 'bi-basket', 'bg-warning text-dark'],
        ['Active Machines', $stats['activeMachines'], 'bi-hdd-rack', 'bg-primary text-white'],
        ['Total Revenue', 'PHP '.number_format($stats['revenue'], 2), 'bi-cash-stack', 'bg-success text-white'],
        ['Pending Orders', $stats['pendingOrders'], 'bi-hourglass-split', 'bg-info text-dark'],
    ] as [$label, $value, $icon, $color])
        <div class="col-md-6 col-xl-3">
            <div class="card p-3 d-flex flex-row align-items-center gap-3">
                <span class="metric-icon {{ $color }}"><i class="bi {{ $icon }}"></i></span>
                <div><div class="text-muted small">{{ $label }}</div><div class="h4 mb-0">{{ $value }}</div></div>
            </div>
        </div>
    @endforeach
</div>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card p-4">
            <h2 class="h6 mb-3">Recent Orders</h2>
            @include('orders._table', ['orders' => $recentOrders])
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card p-4">
            <h2 class="h6 mb-3">System Flow</h2>
            <div class="timeline"><div class="timeline-step done">Pending</div><div class="timeline-step done">Washing</div><div class="timeline-step done">Drying</div><div class="timeline-step done">Ready</div><div class="timeline-step done">Completed</div></div>
        </div>
    </div>
</div>
@endsection
