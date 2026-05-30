@extends('layouts.app')
@section('title', 'Edit Employee')
@section('content')
<div class="card p-4">
    <h2 class="h6 mb-3">Update Employee</h2>
    <form method="POST" action="{{ route('employees.update', $employee) }}">@method('PUT') @include('employees._form')</form>
</div>
@endsection
