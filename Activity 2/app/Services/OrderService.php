<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class OrderService
{
    public const PRICE_PER_KG = 65;

    public function createOrder(User $customer, array $items): Order
    {
        return DB::transaction(function () use ($customer, $items): Order {
            $totalWeight = collect($items)->sum(fn (array $item): float => (float) $item['weight_kg'] * (int) $item['quantity']);
            if ($totalWeight <= 0) throw new RuntimeException('Order weight must be greater than zero.');

            $order = Order::create([
                'user_id' => $customer->id,
                'queue_number' => $this->nextQueueNumber(),
                'total_weight_kg' => $totalWeight,
                'total_amount' => round($totalWeight * self::PRICE_PER_KG, 2),
            ]);

            foreach ($items as $item) $order->items()->create($item);
            $order->payment()->create(['amount' => $order->total_amount, 'method' => 'cash', 'status' => 'pending']);
            return $order->load('items', 'payment');
        });
    }

    public function advance(Order $order): Order
    {
        return DB::transaction(function () use ($order): Order {
            $order->refresh();
            $next = $order->nextStatus();
            if (! $next) throw new RuntimeException('Order is already completed.');
            if ($next === 'completed' && ! $order->isPaid()) throw new RuntimeException('Payment is required before completion.');
            if ($next === 'completed' && $order->machine) {
                $order->machine->update(['status' => 'idle', 'current_load_kg' => 0]);
                $order->completed_at = now();
            }
            $order->status = $next;
            $order->save();
            return $order;
        });
    }

    private function nextQueueNumber(): string
    {
        $count = Order::whereDate('created_at', today())->lockForUpdate()->count() + 1;
        return now()->format('Ymd').'-'.str_pad((string) $count, 3, '0', STR_PAD_LEFT);
    }
}
