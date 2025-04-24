<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    /**
 * @group Destinations
 * 
 * API endpoints for managing destinations
 */

/**
 * Get all destinations
 *
 * This endpoint returns a list of all destinations in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Destination Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */
    public function create()
    {
        return view('resourcesMgmt.destinationForm');
    }

/**
 * @group Destinations
 * 
 * API endpoints for managing destinations
 */

/**
 * Get all destinations
 *
 * This endpoint returns a list of all destinations in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Destination Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */    public function store(Request $request)
    {
        // Validation avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avgDist' => 'required|numeric',
            'timeTravel' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Créer une nouvelle destination
        Destination::create($request->all());

        // Rediriger vers la page de gestion des ressources
        return redirect()->route('dashboard')->with('success', 'Destination ajoutée avec succès!');
    }


    /**
 * @group Destinations
 * 
 * API endpoints for managing destinations
 */

/**
 * Get all destinations
 *
 * This endpoint returns a list of all destinations in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Destination Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */
    public function edit($id)
{
    // Récupère la destination par son ID
    $destination = Destination::findOrFail($id);
    
    // Affiche la vue avec les informations de la destination à modifier
    return view('resourcesMgmt.destinationUpdate', compact('destination'));
}


/**
 * @group Destinations
 * 
 * API endpoints for managing destinations
 */

/**
 * Get all destinations
 *
 * This endpoint returns a list of all destinations in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Destination Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */
public function update(Request $request, $id)
{
    // Récupère la destination par son ID
    $destination = Destination::findOrFail($id);

    // Validation des données soumises avec Validator
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'avgDist' => 'required|numeric',
        'timeTravel' => 'required|numeric',
        'imageUrl' => 'nullable|string|url',  // L'image est optionnelle
    ]);

    // Vérifie si la validation échoue
    if ($validator->fails()) {
        // Redirige en arrière avec les erreurs
        return redirect()->route('resources-mgmt.destinations.edit', $id)
                         ->withErrors($validator)
                         ->withInput();
    }

    // Si la validation passe, met à jour la destination avec les données validées
    $destination->update($validator->validated());

    // Redirige vers la page de gestion des ressources avec un message de succès
    return redirect()->route('dashboard')->with('success', 'Destination mise à jour avec succès!');
}

/**
 * @group Destinations
 * 
 * API endpoints for managing destinations
 */

/**
 * Get all destinations
 *
 * This endpoint returns a list of all destinations in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Destination Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */
public function destroy($id)
{
    // Trouver le membre d'équipage par ID
    $destination = Destination::findOrFail($id);

    // Supprimer le membre d'équipage
    $destination->delete();

    // Rediriger avec un message de succès
    return redirect()->route('dashboard')->with('success', 'Destination supprimée avec succès!');
}


}


