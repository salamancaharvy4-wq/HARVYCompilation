@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')
<div class="card p-4">
    <h2 class="h6 mb-3">Update Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task) }}">@method('PUT') @include('tasks._form')</form>
</div>
@endsection
