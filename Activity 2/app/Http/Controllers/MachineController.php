<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignMachineRequest;
use App\Models\Machine;
use App\Models\Order;
use App\Services\MachineService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RuntimeException;

class MachineController extends Controller
{
    public function index(): View
    {
        return view('machines.index', ['machines' => Machine::latest()->get(), 'pendingOrders' => Order::where('status', 'pending')->latest()->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Machine::create($request->validate(['name' => ['required', 'string', 'max:120', 'unique:machines,name'], 'type' => ['required', 'in:washer,dryer'], 'capacity_kg' => ['required', 'numeric', 'min:1']]));
        return back()->with('success', 'Machine added.');
    }

    public function assign(AssignMachineRequest $request, MachineService $machines): RedirectResponse
    {
        try { $machines->assign(Order::findOrFail($request->integer('order_id')), Machine::findOrFail($request->integer('machine_id'))); }
        catch (RuntimeException $e) { return back()->with('error', $e->getMessage()); }
        return back()->with('success', 'Order assigned and washing started.');
    }
}
