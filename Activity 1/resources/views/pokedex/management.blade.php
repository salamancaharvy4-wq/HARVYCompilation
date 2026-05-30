@extends('layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <h1 class="fw-black text-uppercase m-0 fs-3 fs-md-1"><i class="fas fa-tools me-2"></i> Image Management</h1>
            <a href="{{ route('pokedex.index') }}" class="btn btn-pokedex align-self-start align-self-md-center">
                <i class="fas fa-home me-2"></i> Back to Home
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="min-width: 800px;">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" style="width: 80px;">#</th>
                            <th style="width: 200px;">Pokémon</th>
                            <th style="width: 120px;">Gen</th>
                            <th style="width: 180px;">Current Image</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pokemonList as $pokemon)
                        <tr style="height: 100px;">
                            <td class="ps-4 text-muted fw-bold small">{{ $pokemon['pokedex_number'] }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6">{{ $pokemon['name'] }}</div>
                                    <span class="badge bg-light text-dark border align-self-start" style="font-size: 0.6rem;">{{ $pokemon['type'] }}</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary rounded-pill small" style="font-size: 0.7rem;">{{ $pokemon['generation'] }}</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light rounded p-1 border d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <img src="{{ asset('images/pokedex/' . $pokemon['image']) }}" 
                                             alt="{{ $pokemon['name'] }}" 
                                             style="max-width: 40px; max-height: 40px; object-fit: contain;"
                                             onerror="this.src='https://via.placeholder.com/50x50?text=?'">
                                    </div>
                                    <div class="small text-muted text-truncate" style="max-width: 100px; font-size: 0.7rem;">{{ $pokemon['image'] }}</div>
                                </div>
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center align-items-center gap-2 gap-md-3">
                                    <!-- Upload Form -->
                                    <form action="{{ route('pokedex.upload', $pokemon['id']) }}" method="POST" enctype="multipart/form-data" class="d-flex gap-2 align-items-center m-0">
                                        @csrf
                                        <div class="input-group input-group-sm" style="width: 180px;">
                                            <input type="file" name="image" class="form-control" style="font-size: 0.7rem;" required>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-upload"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Delete Form -->
                                    <form action="{{ route('pokedex.delete', $pokemon['id']) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-2 px-md-3" style="font-size: 0.7rem;" onclick="return confirm('Delete image for {{ addslashes($pokemon['name']) }}?')">
                                            <i class="fas fa-trash me-md-1"></i> <span class="d-none d-md-inline">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 text-muted small d-md-none">
            <i class="fas fa-info-circle me-1"></i> Swipe table left/right to see more
        </div>
    </div>
</div>
@endsection
