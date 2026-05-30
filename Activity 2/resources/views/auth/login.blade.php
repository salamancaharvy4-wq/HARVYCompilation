@extends('layouts.app')

@section('content')
<div class="auth-bg d-flex align-items-center justify-content-center p-4">
    <div class="card p-4" style="max-width: 430px; width: 100%;">
        <div class="text-center mb-4">
            <div class="metric-icon bg-success text-white mx-auto mb-3"><i class="bi bi-droplet-half fs-4"></i></div>
            <h1 class="h4 mb-1">Smart Laundry</h1>
            <p class="text-muted mb-0">Sign in to manage your laundry workflow.</p>
        </div>
        @include('partials.flash')
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label"><input type="checkbox" name="remember" class="form-check-input me-1"> Remember me</label>
                <a href="{{ route('register') }}" class="small">Create account</a>
            </div>
            <button class="btn btn-success w-100">Login</button>
        </form>
    </div>
</div>
@endsection
