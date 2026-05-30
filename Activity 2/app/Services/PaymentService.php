<?php

namespace App\Services;

use App\Models\Order;

class PaymentService
{
    public function pay(Order $order, string $method): void
    {
        $order->payment()->updateOrCreate(['order_id' => $order->id], [
            'amount' => $order->total_amount,
            'method' => $method,
            'status' => 'paid',
            'paid_at' => now(),
        ]);
    }
}
