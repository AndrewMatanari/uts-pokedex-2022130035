<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Storage;
use App\Providers\Paginator;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|in:' . implode(',', Pokemon::$types),
            'weight' => 'nullable|numeric|between:0,999999.99',
            'height' => 'nullable|numeric|between:0,999999.99',
            'hp' => 'nullable|integer|digits_between:0,4',
            'attack' => 'nullable|integer|digits_between:0,4',
            'defense' => 'nullable|integer|digits_between:0,4',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('public');
        }

        Pokemon::create($validatedData);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon.show', compact('pokemon'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', ['pokemon' => $pokemon, 'types' => Pokemon::$types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|in:' . implode(',', Pokemon::$types),
            'weight' => 'nullable|numeric|between:0,999999.99',
            'height' => 'nullable|numeric|between:0,999999.99',
            'hp' => 'nullable|integer|digits_between:0,4',
            'attack' => 'nullable|integer|digits_between:0,4',
            'defense' => 'nullable|integer|digits_between:0,4',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete($pokemon->photo);
            $validatedData['photo'] = $request->file('photo')->store('public');
        }

        $pokemon->update($validatedData);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo) {
            Storage::delete($pokemon->photo);
        }

        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil dihapus.');
    }
}

