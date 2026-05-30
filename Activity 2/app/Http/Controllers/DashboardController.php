<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        if ($user->role === 'customer') {
            return view('dashboards.customer', [
                'activeOrders' => $user->orders()->with('machine', 'payment')->whereNot('status', 'completed')->latest()->get(),
                'historyCount' => $user->orders()->where('status', 'completed')->count(),
            ]);
        }

        return view($user->role === 'admin' ? 'dashboards.admin' : 'dashboards.staff', [
            'stats' => [
                'ordersToday' => Order::whereDate('created_at', today())->count(),
                'activeMachines' => Machine::where('status', 'in_use')->count(),
                'revenue' => Payment::where('status', 'paid')->sum('amount'),
                'pendingOrders' => Order::where('status', 'pending')->count(),
            ],
            'recentOrders' => Order::with('user', 'machine', 'payment')->latest()->limit(8)->get(),
        ]);
    }
}
