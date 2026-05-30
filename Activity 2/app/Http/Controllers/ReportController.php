<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('reports.index', [
            'ordersByStatus' => Order::selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status'),
            'revenue' => Payment::where('status', 'paid')->sum('amount'),
            'machineUsage' => Machine::withCount('orders')->orderByDesc('orders_count')->get(),
        ]);
    }
}
