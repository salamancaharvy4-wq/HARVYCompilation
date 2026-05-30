@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="{{ url('/pokedex?gen=' . $pokemon['generation']) }}" class="btn btn-pokedex mb-4">
            <i class="fas fa-arrow-left"></i> Back to {{ $pokemon['generation'] }}
        </a>

        <div class="card p-4">
            <div class="row">
                <div class="col-md-5 text-center">
                    <div class="p-4 bg-light rounded-4 border border-2 border-secondary mb-3 shadow-inner">
                        <img src="{{ asset('images/pokedex/' . $pokemon['image']) }}" 
                             class="img-fluid" 
                             alt="{{ $pokemon['name'] }}"
                             onerror="this.src='https://via.placeholder.com/400x400?text={{ $pokemon['name'] }}'">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="fw-black text-uppercase m-0" style="letter-spacing: -1px; font-weight: 900;">{{ $pokemon['name'] }}</h1>
                        <span class="fs-3 text-muted fw-bold">#{{ substr($pokemon['pokedex_number'], 1) }}</span>
                    </div>
                    
                    <div class="mb-4">
                        @foreach(explode('/', $pokemon['type']) as $type)
                            <span class="badge badge-type type-{{ trim($type) }} rounded-pill me-2 fs-6 shadow-sm">{{ trim($type) }}</span>
                        @endforeach
                    </div>

                    <div class="details-grid bg-light p-4 rounded-4 border border-1 shadow-sm">
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="text-muted small text-uppercase fw-bold d-block">Generation</label>
                                <span class="fw-bold">{{ $pokemon['generation'] }}</span>
                            </div>
                            <div class="col-6">
                                <label class="text-muted small text-uppercase fw-bold d-block">Ability</label>
                                <span class="fw-bold">{{ $pokemon['ability'] }}</span>
                            </div>
                            <div class="col-6">
                                <label class="text-muted small text-uppercase fw-bold d-block">Habitat</label>
                                <span class="fw-bold">{{ $pokemon['habitat'] }}</span>
                            </div>
                            <div class="col-6">
                                <label class="text-muted small text-uppercase fw-bold d-block">Role</label>
                                <span class="badge bg-{{ $pokemon['role'] == 'starter' ? 'warning text-dark' : 'secondary' }} rounded-pill text-uppercase">
                                    {{ $pokemon['role'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🧬 Evolution Section -->
        <div class="evolution-section mt-5 shadow">
            <h3 class="evolution-title"><i class="fas fa-dna me-2"></i> Evolution Line</h3>
            
            @if(!$nextEvolution && !$finalEvolution)
                <div class="text-center py-5">
                    <i class="fas fa-ghost fa-3x text-muted mb-3"></i>
                    <p class="fs-4 text-muted">No Evolution Available</p>
                </div>
            @else
                <div class="row g-4 justify-content-center align-items-center flex-column flex-md-row">
                    <!-- Current (Self) -->
                    <div class="col-10 col-md-4">
                        <div class="card bg-light border-primary opacity-75 shadow-sm">
                            <img src="{{ asset('images/pokedex/' . $pokemon['image']) }}" class="card-img-top p-3" style="height: 120px;" alt="{{ $pokemon['name'] }}" onerror="this.src='https://via.placeholder.com/150x150?text={{ $pokemon['name'] }}'">
                            <div class="card-body text-center p-2">
                                <small class="text-primary fw-bold text-uppercase" style="font-size: 0.7rem;">Current Form</small>
                                <h6 class="mb-0 fw-bold">{{ $pokemon['name'] }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Horizontal Arrow (Desktop) -->
                    <div class="col-md-1 text-center d-none d-md-block">
                        <i class="fas fa-chevron-right fa-2x text-muted"></i>
                    </div>
                    <!-- Vertical Arrow (Mobile) -->
                    <div class="col-12 text-center d-block d-md-none my-2">
                        <i class="fas fa-chevron-down fa-2x text-muted"></i>
                    </div>

                    <!-- Next Evolution -->
                    @if($nextEvolution)
                    <div class="col-10 col-md-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('images/pokedex/' . $nextEvolution['image']) }}" 
                                 class="card-img-top p-3" style="height: 120px;" alt="{{ $nextEvolution['name'] }}"
                                 onerror="this.src='https://via.placeholder.com/150x150?text={{ $nextEvolution['name'] }}'">
                            <div class="card-body text-center p-3">
                                <span class="small text-muted fw-bold">#{{ substr($nextEvolution['pokedex_number'], 1) }}</span>
                                <h5 class="card-title mb-2 fs-6 fw-bold">{{ $nextEvolution['name'] }}</h5>
                                <div class="mb-3">
                                    @foreach(explode('/', $nextEvolution['type']) as $type)
                                        <span class="badge badge-type type-{{ trim($type) }} rounded-pill" style="font-size: 0.6rem;">{{ trim($type) }}</span>
                                    @endforeach
                                </div>
                                <a href="{{ route('pokedex.show', $nextEvolution['id']) }}" class="btn btn-pokedex btn-sm w-100 py-1" style="font-size: 0.8rem;">View Info</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Final Evolution -->
                    @if($finalEvolution)
                        <!-- Horizontal Arrow (Desktop) -->
                        <div class="col-md-1 text-center d-none d-md-block">
                            <i class="fas fa-chevron-right fa-2x text-muted"></i>
                        </div>
                        <!-- Vertical Arrow (Mobile) -->
                        <div class="col-12 text-center d-block d-md-none my-2">
                            <i class="fas fa-chevron-down fa-2x text-muted"></i>
                        </div>
                        
                        <div class="col-10 col-md-3">
                            <div class="card h-100 border-warning shadow-sm" style="border-width: 2px;">
                                <img src="{{ asset('images/pokedex/' . $finalEvolution['image']) }}" 
                                     class="card-img-top p-3" style="height: 120px;" alt="{{ $finalEvolution['name'] }}"
                                     onerror="this.src='https://via.placeholder.com/150x150?text={{ $finalEvolution['name'] }}'">
                                <div class="card-body text-center p-3">
                                    <span class="small text-muted fw-bold">#{{ substr($finalEvolution['pokedex_number'], 1) }}</span>
                                    <h5 class="card-title mb-2 text-warning fw-black fs-6">{{ $finalEvolution['name'] }}</h5>
                                    <div class="mb-3">
                                        @foreach(explode('/', $finalEvolution['type']) as $type)
                                            <span class="badge badge-type type-{{ trim($type) }} rounded-pill" style="font-size: 0.6rem;">{{ trim($type) }}</span>
                                        @endforeach
                                    </div>
                                    <a href="{{ route('pokedex.show', $finalEvolution['id']) }}" class="btn btn-pokedex btn-sm w-100 py-1" style="font-size: 0.8rem;">View Info</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
