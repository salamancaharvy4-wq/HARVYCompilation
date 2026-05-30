@extends('layouts.app')
@section('title', 'Add Employee')
@section('content')
<div class="card p-4">
    <h2 class="h6 mb-3">Employee Information</h2>
    <form method="POST" action="{{ route('employees.store') }}">@include('employees._form')</form>
</div>
@endsection
