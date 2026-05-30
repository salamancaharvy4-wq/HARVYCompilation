<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['name', 'type', 'capacity_kg', 'status', 'current_load_kg'];
    protected function casts(): array { return ['capacity_kg' => 'decimal:2', 'current_load_kg' => 'decimal:2']; }
    public function orders() { return $this->hasMany(Order::class); }
    public function maintenanceLogs() { return $this->hasMany(MaintenanceLog::class); }
}
