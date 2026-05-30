@extends('layouts.app')
@section('title', 'Create Task')
@section('content')
<div class="card p-4">
    <h2 class="h6 mb-3">Assign New Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">@include('tasks._form')</form>
</div>
@endsection
