@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Pokemon</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <input type="text" class="form-control" id="species" name="species" value="{{ old('species') }}" required>
        </div>

        <div class="mb-3">
            <label for="primary_type" class="form-label">Primary Type</label>
            <select class="form-select" id="primary_type" name="primary_type" required>
                <option value="">Select Type</option>
                @php
                    $types = ['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'];
                @endphp
                @foreach ($types as $type)
                    <option value="{{ $type }}" {{ old('primary_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" max="999999.99">
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">Height</label>
            <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height') }}" max="999999.99">
        </div>

        <div class="mb-3">
            <label for="hp" class="form-label">HP</label>
            <input type="number" class="form-control" id="hp" name="hp" value="{{ old('hp') }}" max="9999">
        </div>

        <div class="mb-3">
            <label for="attack" class="form-label">Attack</label>
            <input type="number" class="form-control" id="attack" name="attack" value="{{ old('attack') }}" max="9999">
        </div>

        <div class="mb-3">
            <label for="defense" class="form-label">Defense</label>
            <input type="number" class="form-control" id="defense" name="defense" value="{{ old('defense') }}" max="9999">
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="is_legendary" value="0">
            <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary', false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_legendary">Legendary</label>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Add Pokemon</button>
    </form>
</div>
@endsection
