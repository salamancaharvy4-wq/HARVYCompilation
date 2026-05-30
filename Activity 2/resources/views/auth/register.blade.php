@extends('layouts.app')

@section('content')
<div class="auth-bg d-flex align-items-center justify-content-center p-4">
    <div class="card p-4" style="max-width: 470px; width: 100%;">
        <div class="text-center mb-4">
            <div class="metric-icon bg-success text-white mx-auto mb-3"><i class="bi bi-person-plus fs-4"></i></div>
            <h1 class="h4 mb-1">Create Account</h1>
            <p class="text-muted mb-0">Customers can order; staff can operate queues.</p>
        </div>
        @include('partials.flash')
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3"><label class="form-label">Name</label><input name="name" value="{{ old('name') }}" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email') }}" class="form-control" required></div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="customer">Customer</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Confirm Password</label><input type="password" name="password_confirmation" class="form-control" required></div>
            <button class="btn btn-success w-100">Register</button>
            <div class="text-center mt-3"><a href="{{ route('login') }}" class="small">Back to login</a></div>
        </form>
    </div>
</div>
@endsection
