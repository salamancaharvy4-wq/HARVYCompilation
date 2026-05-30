<?php

namespace App\Services;

use App\Models\InventoryItem;
use RuntimeException;

class InventoryService
{
    public function detergentNeeded(float $weightKg): float { return round($weightKg * 30, 2); }

    public function consumeForWash(float $weightKg): void
    {
        $detergent = InventoryItem::where('name', 'Detergent')->lockForUpdate()->first();
        $needed = $this->detergentNeeded($weightKg);
        if (! $detergent || (float) $detergent->stock < $needed) {
            throw new RuntimeException("Insufficient detergent inventory. {$needed} ml required.");
        }
        $detergent->decrement('stock', $needed);
    }
}
