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

        // Retourne les crews au format JSON
        return response()->json([
            'data' => $crews
        ]);
    }

    /**
     * Store a newly created crew.
     *
     * @bodyParam name string required Le nom du membre d'équipage.
     * @bodyParam role string required Le rôle du membre d'équipage.
     * @bodyParam description string required La description du membre d'équipage.
     * @bodyParam image string nullable L'URL de l'image du membre d'équipage.
     *
     * @response 201 {
     *  "data": {
     *    "id": 1,
     *    "name": "Crew Name",
     *    "role": "Captain",
     *    "description": "Description of the crew member",
     *    "image": "http://example.com/image.jpg",
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 422 {
     *  "error": "Validation error"
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

        // Si la validation échoue, retourner les erreurs avec un code 422
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $validator->errors()
            ], 422);
        }

        // Créer un nouveau membre d'équipage avec les données validées
        $crew = Crew::create($request->all());

        // Retourner le membre d'équipage créé avec un code 201
        return response()->json([
            'data' => $crew
        ], 201);
    }

    /**
     * Show the details of a specific crew member.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Crew Name",
     *    "role": "Captain",
     *    "description": "Description of the crew member",
     *    "image": "http://example.com/image.jpg",
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Crew member not found"
     * }
     */
    public function show($id)
    {
        $crew = Crew::find($id);

        // Si le membre d'équipage n'existe pas
        if (!$crew) {
            return response()->json([
                'error' => 'Crew member not found'
            ], 404);
        }

        // Retourne le membre d'équipage trouvé
        return response()->json([
            'data' => $crew
        ]);
    }

    /**
     * Update an existing crew member.
     *
     * @bodyParam name string required Le nom du membre d'équipage.
     * @bodyParam role string required Le rôle du membre d'équipage.
     * @bodyParam description string required La description du membre d'équipage.
     * @bodyParam image string nullable L'URL de l'image du membre d'équipage.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Updated Crew Name",
     *    "role": "Updated Role",
     *    "description": "Updated description",
     *    "image": "http://example.com/updated_image.jpg",
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Crew member not found"
     * }
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $validator->errors()
            ], 422);
        }

        // Récupérer le membre d'équipage
        $crew = Crew::find($id);

        if (!$crew) {
            return response()->json([
                'error' => 'Crew member not found'
            ], 404);
        }

        // Mise à jour du membre d'équipage
        $crew->update($request->all());

        // Retourner le membre d'équipage mis à jour
        return response()->json([
            'data' => $crew
        ]);
    }

    /**
     * Delete a crew member.
     *
     * @response 200 {
     *  "message": "Crew member deleted successfully"
     * }
     *
     * @response 404 {
     *  "error": "Crew member not found"
     * }
     */
    public function destroy($id)
    {
        // Récupérer le membre d'équipage
        $crew = Crew::find($id);

        if (!$crew) {
            return response()->json([
                'error' => 'Crew member not found'
            ], 404);
        }

        // Supprimer le membre d'équipage
        $crew->delete();

        // Retourner une réponse de succès
        return response()->json([
            'message' => 'Crew member deleted successfully'
        ]);
    }
}
