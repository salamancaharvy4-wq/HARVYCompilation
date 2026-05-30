@extends('layouts.app')

@section('title', $laundryService->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">{{ $laundryService->name }}</h1>
    <a href="{{ route('laundry-services.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Category</dt>
            <dd class="col-sm-9">{{ $laundryService->category }}</dd>

            <dt class="col-sm-3">Price</dt>
            <dd class="col-sm-9">PHP {{ number_format($laundryService->price, 2) }}</dd>

            <dt class="col-sm-3">Duration</dt>
            <dd class="col-sm-9">{{ $laundryService->duration_minutes }} minutes</dd>

            <dt class="col-sm-3">Detergent Type</dt>
            <dd class="col-sm-9">{{ $laundryService->detergent_type }}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">{{ $laundryService->is_available ? 'Available' : 'Unavailable' }}</dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $laundryService->description ?: 'No description provided.' }}</dd>
        </dl>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('laundry-services.edit', $laundryService) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('laundry-services.destroy', $laundryService) }}" method="POST" onsubmit="return confirm('Delete this laundry service?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
