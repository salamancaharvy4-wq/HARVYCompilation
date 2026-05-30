@extends('layouts.app')
@section('title', 'Track Order #'.$order->id)
@section('content')
@php $statuses = \App\Models\Order::STATUSES; $current = array_search($order->status, $statuses, true); @endphp
<div class="card p-4"><div class="d-flex justify-content-between mb-4"><div><h2 class="h5">Queue {{ $order->queue_number }}</h2><p class="text-muted mb-0">{{ $order->machine->name ?? 'Machine not assigned yet' }}</p></div><x-badge :value="$order->status" /></div><div class="timeline">@foreach($statuses as $i=>$status)<div class="timeline-step {{ $i <= $current ? 'done' : '' }}">{{ ucfirst($status) }}</div>@endforeach</div></div>
@endsection
