@extends('layouts.app')
@section('title', 'Customer Dashboard')
@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-4"><a href="{{ route('orders.create') }}" class="card p-4 text-decoration-none h-100"><i class="bi bi-plus-circle fs-2 text-success"></i><h2 class="h5 mt-3">Create New Order</h2><p class="text-muted mb-0">Add laundry items and enter the queue.</p></a></div>
    <div class="col-md-4"><div class="card p-4 h-100"><i class="bi bi-basket fs-2 text-primary"></i><h2 class="h5 mt-3">{{ $activeOrders->count() }}</h2><p class="text-muted mb-0">My Active Orders</p></div></div>
    <div class="col-md-4"><div class="card p-4 h-100"><i class="bi bi-clock-history fs-2 text-success"></i><h2 class="h5 mt-3">{{ $historyCount }}</h2><p class="text-muted mb-0">Order History</p></div></div>
</div>
<div class="card p-4"><h2 class="h6 mb-3">Order Tracking</h2>@include('orders._table', ['orders' => $activeOrders])</div>
@endsection
