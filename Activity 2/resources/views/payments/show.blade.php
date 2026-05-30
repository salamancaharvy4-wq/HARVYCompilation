@extends('layouts.app')
@section('title', 'Payment for Order #'.$order->id)
@section('content')
<div class="row justify-content-center"><div class="col-lg-6"><div class="card p-4"><div class="d-flex justify-content-between mb-3"><h2 class="h5">Order Payment</h2><x-badge type="payment" :value="$order->payment->status ?? 'pending'" /></div><div class="d-flex justify-content-between border-bottom py-2"><span>Order ID</span><strong>#{{ $order->id }}</strong></div><div class="d-flex justify-content-between border-bottom py-2"><span>Total Amount</span><strong>PHP {{ number_format($order->total_amount, 2) }}</strong></div><form method="POST" action="{{ route('payments.pay', $order) }}" class="mt-4">@csrf<label class="form-label">Payment Method</label><div class="d-grid gap-2"><button name="method" value="cash" class="btn btn-outline-success">Cash</button><button name="method" value="gcash" class="btn btn-outline-primary">GCash Simulated</button></div></form></div></div></div>
@endsection
