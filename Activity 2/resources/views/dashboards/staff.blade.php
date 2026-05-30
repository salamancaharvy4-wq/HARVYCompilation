@extends('layouts.app')
@section('title', 'Staff Dashboard')
@section('content')
<div class="row g-3 mb-4">
    @foreach([['Orders Today',$stats['ordersToday'],'bi-basket','bg-warning text-dark'],['Active Machines',$stats['activeMachines'],'bi-hdd-rack','bg-primary text-white'],['Pending Queue',$stats['pendingOrders'],'bi-hourglass','bg-info text-dark']] as [$label,$value,$icon,$color])
    <div class="col-md-4"><div class="card p-3 d-flex flex-row align-items-center gap-3"><span class="metric-icon {{ $color }}"><i class="bi {{ $icon }}"></i></span><div><div class="text-muted small">{{ $label }}</div><div class="h4 mb-0">{{ $value }}</div></div></div></div>
    @endforeach
</div>
<div class="card p-4"><h2 class="h6 mb-3">Queue Monitor</h2>@include('orders._table', ['orders' => $recentOrders])</div>
@endsection
