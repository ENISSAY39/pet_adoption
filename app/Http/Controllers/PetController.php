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
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'breed' => 'nullable|string|max:255',
        ]);

        // Création
        Pet::create($request->all());

        // Redirection + message
        return redirect()->route('pets.index')->with('success', 'Animal added avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
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
    // Validation des champs
    $request->validate([
        'name' => 'required|string|max:255',
        'species' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'breed' => 'nullable|string|max:255',
        'adopted' => 'boolean',
    ]);

    // Mise à jour du pet
    $pet->update($request->all());

    // Redirection vers la liste avec un message de succès
    return redirect()->route('pets.index')->with('success', 'Animal updated with sucess !');
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
