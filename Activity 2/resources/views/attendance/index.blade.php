@extends('layouts.app')
@section('title', auth()->user()->role === 'admin' ? 'Attendance Monitoring' : 'My Attendance')
@section('content')
@if(auth()->user()->role === 'employee')
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card p-4 h-100">
                <div class="text-muted small">Today</div>
                <h2 class="h5 mt-2">{{ now()->format('F d, Y') }}</h2>
                <p class="mb-0 text-muted">Time in: {{ $todayAttendance?->time_in?->format('h:i A') ?? 'None' }}</p>
                <p class="mb-0 text-muted">Time out: {{ $todayAttendance?->time_out?->format('h:i A') ?? 'None' }}</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-4 h-100">
                <h2 class="h6 mb-3">Record Attendance</h2>
                <div class="d-flex flex-wrap gap-2">
                    <form method="POST" action="{{ route('attendance.time-in') }}">@csrf<button class="btn btn-primary"><i class="bi bi-box-arrow-in-right me-1"></i>Time In</button></form>
                    <form method="POST" action="{{ route('attendance.time-out') }}">@csrf<button class="btn btn-outline-primary"><i class="bi bi-box-arrow-right me-1"></i>Time Out</button></form>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card p-4">
    <h2 class="h6 mb-3">Attendance History</h2>
    @include('attendance._table', ['attendances' => $attendances])
    {{ method_exists($attendances, 'links') ? $attendances->links() : '' }}
</div>
@endsection
