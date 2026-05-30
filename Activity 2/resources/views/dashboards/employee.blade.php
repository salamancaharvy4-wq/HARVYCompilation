@extends('layouts.app')
@section('title', 'Employee Dashboard')
@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="text-muted small">Today's Attendance</div>
            <h2 class="h5 mt-2">{{ $todayAttendance?->time_in ? 'Timed In' : 'Not Timed In' }}</h2>
            <p class="mb-0 text-muted">Time in: {{ $todayAttendance?->time_in?->format('h:i A') ?? 'None' }} | Time out: {{ $todayAttendance?->time_out?->format('h:i A') ?? 'None' }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="text-muted small">Assigned Tasks</div>
            <h2 class="h5 mt-2">{{ $tasks->count() }}</h2>
            <p class="mb-0 text-muted">Latest assigned work items</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100">
            <div class="text-muted small">Quick Attendance</div>
            <div class="d-grid gap-2 mt-2">
                <form method="POST" action="{{ route('attendance.time-in') }}">@csrf<button class="btn btn-primary w-100">Time In</button></form>
                <form method="POST" action="{{ route('attendance.time-out') }}">@csrf<button class="btn btn-outline-primary w-100">Time Out</button></form>
            </div>
        </div>
    </div>
</div>
<div class="row g-4">
    <div class="col-lg-7"><div class="card p-4"><h2 class="h6 mb-3">Assigned Tasks</h2>@include('tasks._table', ['tasks' => $tasks, 'compact' => false])</div></div>
    <div class="col-lg-5"><div class="card p-4"><h2 class="h6 mb-3">Attendance History</h2>@include('attendance._table', ['attendances' => $attendanceHistory])</div></div>
</div>
@endsection
