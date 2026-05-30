<div class="table-responsive"><table class="table align-middle"><thead><tr><th>Order ID</th><th>Customer</th><th>Status</th><th>Machine</th><th>Queue</th><th>Payment</th><th></th></tr></thead><tbody>
@forelse($orders as $order)
<tr><td>#{{ $order->id }}</td><td>{{ $order->user->name ?? auth()->user()->name }}</td><td><x-badge :value="$order->status" /></td><td>{{ $order->machine->name ?? 'Unassigned' }}</td><td>{{ $order->queue_number }}</td><td><x-badge type="payment" :value="$order->payment->status ?? 'pending'" /></td><td class="text-end"><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a> <a href="{{ route('orders.track', $order) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-geo-alt"></i></a></td></tr>
@empty<tr><td colspan="7" class="text-center text-muted py-4">No orders found.</td></tr>@endforelse
</tbody></table></div>
