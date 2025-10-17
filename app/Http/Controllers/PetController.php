<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('species')->get();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $species = Species::orderBy('name')->get();
        return view('pets.create', compact('species'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species_id' => 'required|exists:species,id',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['adopted'] = $request->has('adopted');

        Pet::create($data);

        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }

    public function show(Pet $pet)
    {
        $pet->load('species');
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $species = Species::orderBy('name')->get();
        return view('pets.edit', compact('pet', 'species'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species_id' => 'required|exists:species,id',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['adopted'] = $request->has('adopted');

        $pet->update($data);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
