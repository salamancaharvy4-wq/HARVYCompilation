<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const STATUSES = ['pending', 'washing', 'drying', 'ready', 'completed'];

    protected $fillable = ['user_id', 'machine_id', 'queue_number', 'status', 'total_weight_kg', 'total_amount', 'assigned_at', 'completed_at'];

    protected function casts(): array
    {
        return [
            'total_weight_kg' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'assigned_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
    public function machine() { return $this->belongsTo(Machine::class); }
    public function payment() { return $this->hasOne(Payment::class); }
    public function isPaid(): bool { return $this->payment?->status === 'paid'; }

    public function nextStatus(): ?string
    {
        $index = array_search($this->status, self::STATUSES, true);
        return $index === false ? null : (self::STATUSES[$index + 1] ?? null);
    }
}
