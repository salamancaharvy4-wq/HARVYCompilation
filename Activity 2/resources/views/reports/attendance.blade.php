@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h6 mb-0">{{ $title }}</h2>
        <div class="btn-group btn-group-sm">
            <a href="{{ route('reports.daily') }}" class="btn btn-outline-primary">Daily</a>
            <a href="{{ route('reports.weekly') }}" class="btn btn-outline-primary">Weekly</a>
        </div>
    </div>
    @include('attendance._table', ['attendances' => $attendances])
</div>
@endsection
