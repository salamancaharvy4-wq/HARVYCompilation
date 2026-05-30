@extends('layouts.app')

@section('title', 'Add Laundry Service')

@section('content')
<h1 class="h3 mb-3">Add Laundry Service</h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('laundry-services.store') }}" method="POST">
            @include('laundry-services._form', ['submitLabel' => 'Save Record'])
        </form>
    </div>
</div>
@endsection
