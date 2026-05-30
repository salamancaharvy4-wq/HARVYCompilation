@extends('layouts.app')
@section('title', auth()->user()->role === 'admin' ? 'Task Management' : 'My Tasks')
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h6 mb-0">Tasks</h2>
        @if(auth()->user()->role === 'admin')<a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i>Create Task</a>@endif
    </div>
    @include('tasks._table', ['tasks' => $tasks, 'compact' => false])
    {{ method_exists($tasks, 'links') ? $tasks->links() : '' }}
</div>
@endsection
