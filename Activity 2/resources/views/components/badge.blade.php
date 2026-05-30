@props(['type' => 'status', 'value'])
@php
    $key = strtolower(str_replace(' ', '_', $value));
    $class = match ($type) {
        'machine' => "status-$key",
        'stock' => $key === 'high_stock' ? 'stock-high' : ($key === 'low_stock' ? 'stock-low' : 'stock-out'),
        'payment' => $key === 'paid' ? 'status-paid' : 'status-pending-payment',
        default => "status-$key",
    };
@endphp
<span class="badge {{ $class }}">{{ ucwords(str_replace('_', ' ', $value)) }}</span>
