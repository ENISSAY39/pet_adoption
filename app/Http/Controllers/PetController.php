<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(Request $request)
    {
        $query = Pet::with('species');

        if ($request->filled('species_id')) {
            $query->where('species_id', $request->species_id);
        }

        // adopted can be '1' or '0' (string from form)
        if ($request->filled('adopted') && in_array($request->adopted, ['1', '0'], true)) {
            $query->where('adopted', (bool) $request->adopted);
        }

        if ($request->filled('min_age')) {
            $query->where('age', '>=', (int) $request->min_age);
        }

        if ($request->filled('max_age')) {
            $query->where('age', '<=', (int) $request->max_age);
        }

        $pets = $query->paginate(10)->appends($request->query());
        $species = Species::orderBy('name')->get();

        return view('pets.index', compact('pets', 'species'));
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
