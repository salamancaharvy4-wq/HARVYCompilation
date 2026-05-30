<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Payment::with('order.user')->latest();
        if ($request->user()->role === 'customer') $query->whereHas('order', fn ($q) => $q->where('user_id', $request->user()->id));
        return view('payments.index', ['payments' => $query->paginate(15)]);
    }

    public function show(Request $request, Order $order): View
    {
        abort_if($request->user()->role === 'customer' && $order->user_id !== $request->user()->id, 403);
        return view('payments.show', ['order' => $order->load('payment', 'user')]);
    }

    public function pay(StorePaymentRequest $request, Order $order, PaymentService $payments): RedirectResponse
    {
        abort_if($request->user()->role === 'customer' && $order->user_id !== $request->user()->id, 403);
        $payments->pay($order, $request->validated('method'));
        return back()->with('success', 'Payment recorded.');
    }
}
