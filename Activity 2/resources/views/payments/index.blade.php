@extends('layouts.app')
@section('title', 'Payments')
@section('content')
<div class="card p-4"><h2 class="h6 mb-3">Payment History</h2><table class="table align-middle"><thead><tr><th>Order</th><th>Customer</th><th>Amount</th><th>Method</th><th>Status</th><th></th></tr></thead><tbody>@foreach($payments as $payment)<tr><td>#{{ $payment->order_id }}</td><td>{{ $payment->order->user->name }}</td><td>PHP {{ number_format($payment->amount, 2) }}</td><td>{{ strtoupper($payment->method) }}</td><td><x-badge type="payment" :value="$payment->status" /></td><td><a href="{{ route('payments.show', $payment->order) }}" class="btn btn-sm btn-outline-primary">Open</a></td></tr>@endforeach</tbody></table>{{ $payments->links() }}</div>
@endsection
