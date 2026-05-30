<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f7fb; }
        .navbar { background: #0f766e; }
        .page-shell { max-width: 1120px; }
        .card { border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 10px 22px rgba(15, 23, 42, .05); }
        .table thead th { background: #eef7f6; color: #134e4a; }
        .badge-available { background: #dcfce7; color: #166534; }
        .badge-unavailable { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark mb-4">
    <div class="container page-shell">
        <a class="navbar-brand fw-semibold" href="{{ route('laundry-services.index') }}">Laundry Service Package CRUD</a>
        <a class="btn btn-light btn-sm" href="{{ route('laundry-services.create') }}">Add Service</a>
    </div>
</nav>

<main class="container page-shell pb-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
