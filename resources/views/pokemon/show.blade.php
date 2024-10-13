@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-color: #f9f9f9;">
    <h1 class="mb-4 text-center" style="font-family: 'Pokemon Solid', sans-serif; color: #000000;">Pokemon Detail</h1>

    <div class="card mb-3 shadow-sm" style="border-radius: 15px;">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center align-items-center" style="background-color: #f0f0f0; border-radius: 15px 0 0 15px;">
                <!-- Menampilkan foto Pokemon -->
                <img src="{{ $pokemon->photo ? asset(str_replace('public', 'storage', $pokemon->photo)) : 'https://placehold.co/200' }}" class="card-img-top img-fluid rounded-start" alt="{{ $pokemon->name }}" style="width: 200px; height: 200px; object-fit: contain;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} - {{ $pokemon->name }}</h5>
                    <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                    <p class="card-text"><strong>Primary Type:</strong> <span class="badge" style="background-color: {{ $pokemon->primary_type == 'Fire' ? '#FF5733' : '#3498db' }};">{{ $pokemon->primary_type }}</span></p>
                    <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                    <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }} m</p>
                    <p class="card-text"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                    <p class="card-text"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                    <p class="card-text"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                    <p class="card-text"><strong>Power:</strong> {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</p>
                    <p class="card-text"><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('pokedex.index') }}" class="btn btn-secondary" style="background-color: #3b4cca; border: none;">Back to Pokedex</a>
        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary" style="background-color: #3b4cca; border: none;">Pokemon Dashboard</a>
    </div>
</div>
@endsection
