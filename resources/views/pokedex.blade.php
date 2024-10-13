@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pokedex</h1>

    <!-- Grid Layout 3x3 -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($pokemons as $pokemon)
            <div class="col">
                <div class="card h-100">
                    <a href="{{ route('pokemon.show', $pokemon->id) }}">
                        <img src="{{ $pokemon->photo ? asset(str_replace('public', 'storage', $pokemon->photo)) : 'https://placehold.co/200' }}"
                             class="card-img-top" alt="{{ $pokemon->name }}">
                    </a>
                    <div class="card-body">
                        <h7 class="card-title">
                            <span class="fw-bold">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </h7>
                        <h3>
                            <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none text-dark">
                                <span class="fw-bold fs-4">{{ $pokemon->name }}</span>
                            </a>
                        </h3>
                        <p class="card-text">
                            <span class="badge rounded-pill bg-primary">{{ $pokemon->primary_type }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection
