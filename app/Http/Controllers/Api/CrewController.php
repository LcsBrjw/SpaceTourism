<?php

namespace App\Http\Controllers\Api;

use App\Models\Crew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CrewController extends Controller
{
/**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
    public function index()
    {
        // Récupère tous les membres d'équipage
        $crews = Crew::all();

        // Retourne une vue avec les données des membres d'équipage
        return view('resourcesMgmt', ['crews' => $crews]);
    }


/**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
        return view('resourcesMgmt.crewForm');
    }






    /**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
    public function store(Request $request)
    {
        // Validation des données avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|url', // Validation de l'URL pour l'image
        ]);
    
        // Si la validation échoue, retourner les erreurs avec les anciennes entrées
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Créer un nouveau membre d'équipage avec les données validées
        Crew::create($request->all());
    
        // Retourner à la liste des membres avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Membre ajouté avec succès!');
    }



/**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
        // Récupérer le membre d'équipage par ID
        $crew = Crew::findOrFail($id);
    
        // Retourner la vue d'édition avec le membre
        return view('resourcesMgmt.crewUpdate', compact('crew'));
    }




/**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
    // Validation manuelle avec Validator
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|url',
    ]);

    // Vérifie si la validation échoue
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Récupérer le membre d'équipage par ID
    $crew = Crew::findOrFail($id);

    // Mettre à jour le membre d'équipage avec les données validées
    $crew->update($validator->validated());

    // Retourner à la liste des membres avec un message de succès
    return redirect()->route('resources-mgmt.crews.index')->with('success', 'Membre mis à jour avec succès!');
}


    /**
 * @group Crews
 * 
 * API endpoints for managing crews
 */

/**
 * Get all crews
 *
 * This endpoint returns a list of all crews in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Crew Name",
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
        $crew = Crew::findOrFail($id);

        // Supprimer le membre d'équipage
        $crew->delete();

        // Rediriger avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Membre supprimé avec succès!');
    }



}
