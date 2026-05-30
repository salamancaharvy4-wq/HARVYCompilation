<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Machine;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RuntimeException;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Order::with('user', 'machine', 'payment')->latest();
        if ($request->user()->role === 'customer') $query->where('user_id', $request->user()->id);
        return view('orders.index', ['orders' => $query->paginate(15)]);
    }

    public function create(): View { return view('orders.create'); }

    public function store(StoreOrderRequest $request, OrderService $orders): RedirectResponse
    {
        try { $order = $orders->createOrder($request->user(), $request->validated('items')); }
        catch (RuntimeException $e) { return back()->withInput()->with('error', $e->getMessage()); }
        return redirect()->route('orders.show', $order)->with('success', 'Order created and queued.');
    }

    public function show(Request $request, Order $order): View
    {
        abort_if($request->user()->role === 'customer' && $order->user_id !== $request->user()->id, 403);
        return view('orders.show', ['order' => $order->load('items', 'user', 'machine', 'payment'), 'machines' => Machine::where('status', 'idle')->get()]);
    }

    public function track(Request $request, Order $order): View
    {
        abort_if($request->user()->role === 'customer' && $order->user_id !== $request->user()->id, 403);
        return view('orders.track', ['order' => $order->load('machine', 'payment')]);
    }

    public function advance(Order $order, OrderService $orders): RedirectResponse
    {
        try { $orders->advance($order); }
        catch (RuntimeException $e) { return back()->with('error', $e->getMessage()); }
        return back()->with('success', 'Order moved to the next status.');
    }
}
