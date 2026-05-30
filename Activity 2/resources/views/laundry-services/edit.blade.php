@extends('layouts.app')

@section('title', 'Edit Laundry Service')

@section('content')
<h1 class="h3 mb-3">Edit Laundry Service</h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('laundry-services.update', $laundryService) }}" method="POST">
            @method('PUT')
            @include('laundry-services._form', ['submitLabel' => 'Update Record'])
        </form>
    </div>
</div>
@endsection
