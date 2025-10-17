<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les pets dans la base
        $pets = Pet::all();

        // On envoie la variable $pets à la vue
        return view('pets.index', compact('pets'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Affiche le formulaire de création d'un pet
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        // Force adopted = true if checkbox checked, false otherwise
        $data = $request->all();
        $data['adopted'] = $request->has('adopted');

        Pet::create($data);

        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['adopted'] = $request->has('adopted'); // 👈 this line is the key

        $pet->update($data);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet supprimé avec succès !');
    }
}
