@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-color: #f9f9f9;">
    <h1 class="text-center" style="font-family: 'Pokemon Solid', sans-serif; color: #000000;">Daftar Pokemon</h1>

    <div class="text-end mb-3">
        <a href="{{ route('pokemon.create') }}" class="btn btn-primary" style="background-color: #3b4cca; border: none;">Tambah Pokemon</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center" style="background-color: #fff; border-radius: 10px; overflow: hidden;">
            <thead class="table-dark" style="background-color: #3b4cca;">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Species</th>
                    <th class="text-center">Primary Type</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Power</th>
                    <th class="text-center" style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $pokemon)
                <tr>
                    <td>#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->species }}</td>
                    <td>
                        <span class="badge" style="background-color: {{ $pokemon->primary_type == 'Fire' ? '#FF5733' : '#3498db' }};">{{ $pokemon->primary_type }}</span>
                    </td>
                    <td>
                        <img src="{{ $pokemon->photo ? asset(str_replace('public', 'storage', $pokemon->photo)) : 'https://placehold.co/200' }}" alt="{{ $pokemon->name }}" style="width: 100px; height: 100px; object-fit: contain; border-radius: 10px;">
                    </td>
                    <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                    <td style="width: 200px;">
                        <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection

