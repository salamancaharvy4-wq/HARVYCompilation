<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    protected $fillable = ['machine_id', 'reported_by', 'issue', 'status', 'fixed_at'];
    protected function casts(): array { return ['fixed_at' => 'datetime']; }
    public function machine() { return $this->belongsTo(Machine::class); }
    public function reporter() { return $this->belongsTo(User::class, 'reported_by'); }
}
