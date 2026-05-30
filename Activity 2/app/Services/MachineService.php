<?php

namespace App\Services;

use App\Models\Machine;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class MachineService
{
    public function __construct(private readonly InventoryService $inventoryService) {}

    public function assign(Order $order, Machine $machine): Order
    {
        return DB::transaction(function () use ($order, $machine): Order {
            $order->refresh(); $machine->refresh();
            if ($order->status !== 'pending') throw new RuntimeException('Only pending orders can be assigned to a machine.');
            if ($machine->status !== 'idle') throw new RuntimeException('Selected machine is not available.');
            if ((float) $order->total_weight_kg > (float) $machine->capacity_kg) throw new RuntimeException('Machine capacity cannot handle this order load.');
            $this->inventoryService->consumeForWash((float) $order->total_weight_kg);
            $machine->update(['status' => 'in_use', 'current_load_kg' => $order->total_weight_kg]);
            $order->update(['machine_id' => $machine->id, 'status' => 'washing', 'assigned_at' => now()]);
            return $order->load('machine');
        });
    }

    public function reportIssue(Machine $machine, User $reporter, string $issue)
    {
        return DB::transaction(function () use ($machine, $reporter, $issue) {
            $machine->update(['status' => 'maintenance', 'current_load_kg' => 0]);
            return $machine->maintenanceLogs()->create(['reported_by' => $reporter->id, 'issue' => $issue, 'status' => 'reported']);
        });
    }

    public function markFixed(int $logId): void
    {
        DB::transaction(function () use ($logId): void {
            $log = \App\Models\MaintenanceLog::with('machine')->findOrFail($logId);
            $log->update(['status' => 'fixed', 'fixed_at' => now()]);
            $log->machine->update(['status' => 'idle']);
        });
    }
}
