@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center"><strong>Pokedex</strong></h1>
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
                            <span class="fw-bold">{{$padded = Str::padLeft($pokemon->id, 5, '#0000')}}</span>
                        </h7>
                        <h3>
                            <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none text-dark">
                                <span class="fw-bold fs-4">{{ $pokemon->name }}</span>
                            </a>
                        </h3>
                        <p class="card-text">
                            @php
                                $typesColors = [
                                    'fire' => 'bg-danger',
                                    'water' => 'bg-primary',
                                    'grass' => 'bg-success',
                                    'electric' => 'bg-warning',
                                    'bug' => 'bg-light',
                                    'ghost' => 'bg-secondary',
                                    'psychic' => 'bg-info',
                                    'fighting' => 'bg-dark',
                                    'normal' => 'bg-muted text-dark',
                                ];

                                // Ambil warna badge sesuai tipe Pokemon
                                $badgeColor = $typesColors[strtolower($pokemon->primary_type)] ?? 'bg-secondary';
                            @endphp

                            <span class="badge rounded-pill {{ $badgeColor }} text-white">{{ $pokemon->primary_type }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection
