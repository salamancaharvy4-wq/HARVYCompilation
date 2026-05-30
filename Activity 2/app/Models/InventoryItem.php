<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $table = 'inventory';
    protected $fillable = ['name', 'stock', 'unit', 'low_stock_threshold'];
    protected function casts(): array { return ['stock' => 'decimal:2', 'low_stock_threshold' => 'decimal:2']; }

    public function stockStatus(): string
    {
        if ((float) $this->stock <= 0) return 'Out of Stock';
        if ((float) $this->stock <= (float) $this->low_stock_threshold) return 'Low Stock';
        return 'High Stock';
    }
}
