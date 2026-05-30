@extends('layouts.app')
@section('title', auth()->user()->role === 'customer' ? 'My Orders' : 'Orders Queue')
@section('content')
<div class="card p-4"><div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h6 mb-0">Orders</h2>@if(auth()->user()->role !== 'staff')<a href="{{ route('orders.create') }}" class="btn btn-success btn-sm">Create Order</a>@endif</div>@include('orders._table', ['orders' => $orders]){{ $orders->links() }}</div>
@endsection
