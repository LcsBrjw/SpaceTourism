<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    
    
/**
 * @group Technologys
 * 
 * API endpoints for managing technologys
 */

/**
 * Get all technologies
 *
 * This endpoint returns a list of all technologys in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Technology Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */    public function create()
    {
        return view('resourcesMgmt.technologyForm'); 
    }
    




    // Affiche le formulaire d'édition pour une technologie spécifique
    public function edit($id)
    {
        // Récupère la technologie par son ID
        $technology = Technology::findOrFail($id);

        // Retourne la vue du formulaire d'édition avec la technologie à éditer
        return view('resourcesMgmt.technologyUpdate', compact('technology'));
    }




/**
 * @group Technologys
 * 
 * API endpoints for managing technologys
 */

/**
 * Get all technologies
 *
 * This endpoint returns a list of all technologys in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Technology Name",
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
            'description' => 'required|string',
            'imgMob' => 'nullable|string|url',
            'imgDesk' => 'nullable|string|url',
        ]);
    
        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();  // Retourner avec les erreurs
        }
    
        // Si la validation réussit, créer une nouvelle technologie
        Technology::create($validator->validated());
    
        // Rediriger avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Technologie ajoutée avec succès!');
    }
    


/**
 * @group Technologys
 * 
 * API endpoints for managing technologys
 */

/**
 * Get all technologies
 *
 * This endpoint returns a list of all technologys in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Technology Name",
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
        // Validation des données avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'imgMob' => 'nullable|string|url',
            'imgDesk' => 'nullable|string|url',
        ]);
    
        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();  // Retourner avec les erreurs
        }
    
        // Trouver la technologie par son ID
        $technology = Technology::findOrFail($id);
    
        // Mettre à jour la technologie avec les données validées
        $technology->update($validator->validated());
    
        // Rediriger avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Technologie mise à jour avec succès!');
    }
    

/**
 * @group Technologys
 * 
 * API endpoints for managing technologys
 */

/**
 * Get all technologies
 *
 * This endpoint returns a list of all technologys in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Technology Name",
 *      "created_at": "2025-04-23T14:00:00Z",
 *      "updated_at": "2025-04-23T14:00:00Z"
 *    }
 *  ]
 * }
 *
 * @response 500 {
 *  "error": "Internal server error"
 * }
 */    public function destroy($id)
    {
        // Récupère la technologie à supprimer
        $technology = Technology::findOrFail($id);

        // Supprime la technologie
        $technology->delete();

        // Redirection vers la liste des technologies avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Technologie supprimée avec succès!');
    }
}
