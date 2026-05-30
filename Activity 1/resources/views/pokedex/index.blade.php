@extends('layout')

@section('content')
<div class="gen-nav shadow-sm">
    @foreach($generations as $gen)
        <a href="{{ route('pokedex.index', ['gen' => $gen]) }}" 
           class="gen-link {{ $selectedGen == $gen ? 'active' : '' }}">
           {{ $gen }}
        </a>
    @endforeach
</div>

<div class="starter-box shadow">
    <h2 class="starter-title">
        <i class="fas fa-star me-2"></i> {{ $selectedGen }} Starters
    </h2>
    <div class="row g-3 g-md-4">
        @foreach($starters as $pokemon)
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('pokedex.show', $pokemon['id']) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="{{ asset('images/pokedex/' . $pokemon['image']) }}" 
                             class="card-img-top" alt="{{ $pokemon['name'] }}"
                             onerror="this.src='https://via.placeholder.com/200x200?text={{ $pokemon['name'] }}'">
                        <div class="card-body text-center">
                            <span class="text-muted fw-bold">#{{ substr($pokemon['pokedex_number'], 1) }}</span>
                            <h4 class="card-title mt-2 fw-black text-uppercase">{{ $pokemon['name'] }}</h4>
                            <div class="mt-3">
                                @foreach(explode('/', $pokemon['type']) as $type)
                                    <span class="badge badge-type type-{{ trim($type) }} rounded-pill shadow-sm">{{ trim($type) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<div class="main-list mt-5">
    <div class="d-flex align-items-center mb-5">
        <div class="flex-grow-1 h-1px bg-dark opacity-25"></div>
        <h3 class="mx-4 text-uppercase fw-black" style="letter-spacing: 2px; font-weight: 900;">
            <i class="fas fa-list-ul me-2 text-danger"></i> Regional List
        </h3>
        <div class="flex-grow-1 h-1px bg-dark opacity-25"></div>
    </div>
    
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 g-md-4">
        @foreach($normalList as $pokemon)
            <div class="col">
                <a href="{{ route('pokedex.show', $pokemon['id']) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="text-muted small fw-bold">#{{ substr($pokemon['pokedex_number'], 1) }}</span>
                        </div>
                        <img src="{{ asset('images/pokedex/' . $pokemon['image']) }}" 
                             class="card-img-top" alt="{{ $pokemon['name'] }}"
                             onerror="this.src='https://via.placeholder.com/200x200?text={{ $pokemon['name'] }}'">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold text-uppercase mb-3">{{ $pokemon['name'] }}</h5>
                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                @foreach(explode('/', $pokemon['type']) as $type)
                                    <span class="badge badge-type type-{{ trim($type) }} rounded-pill" style="font-size: 0.7rem;">{{ trim($type) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .h-1px { height: 2px; }
    .fw-black { font-weight: 900; }
</style>
@endsection
