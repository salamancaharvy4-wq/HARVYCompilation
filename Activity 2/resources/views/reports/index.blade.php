@extends('layouts.app')
@section('title', 'Reports')
@section('content')
<div class="row g-4"><div class="col-lg-4"><div class="card p-4"><h2 class="h6 mb-3">Revenue</h2><div class="display-6">PHP {{ number_format($revenue, 2) }}</div></div></div><div class="col-lg-8"><div class="card p-4"><h2 class="h6 mb-3">Orders By Status</h2><table class="table">@foreach($ordersByStatus as $status=>$total)<tr><td><x-badge :value="$status" /></td><td>{{ $total }}</td></tr>@endforeach</table></div></div><div class="col-12"><div class="card p-4"><h2 class="h6 mb-3">Machine Usage</h2><table class="table"><thead><tr><th>Machine</th><th>Orders Handled</th><th>Status</th></tr></thead><tbody>@foreach($machineUsage as $machine)<tr><td>{{ $machine->name }}</td><td>{{ $machine->orders_count }}</td><td><x-badge type="machine" :value="$machine->status" /></td></tr>@endforeach</tbody></table></div></div></div>
@endsection
