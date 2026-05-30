@extends('layouts.app')

@section('title', 'Laundry Services')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between gap-3 align-items-md-center mb-3">
    <div>
        <h1 class="h3 mb-1">Laundry Services</h1>
        <p class="text-muted mb-0">Create, view, update, and delete laundry service packages from the database.</p>
    </div>
    <a href="{{ route('laundry-services.create') }}" class="btn btn-success">Add New Record</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('laundry-services.index') }}" class="row g-2 mb-3">
            <div class="col-md-10">
                <input name="search" type="search" class="form-control" value="{{ $search }}" placeholder="Search by name, category, or detergent">
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-outline-success">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laundryServices as $service)
                        <tr>
                            <td class="fw-semibold">{{ $service->name }}</td>
                            <td>{{ $service->category }}</td>
                            <td>PHP {{ number_format($service->price, 2) }}</td>
                            <td>{{ $service->duration_minutes }} mins</td>
                            <td>
                                <span class="badge {{ $service->is_available ? 'badge-available' : 'badge-unavailable' }}">
                                    {{ $service->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('laundry-services.show', $service) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="{{ route('laundry-services.edit', $service) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('laundry-services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this laundry service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No laundry services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $laundryServices->links() }}
    </div>
</div>
@endsection
