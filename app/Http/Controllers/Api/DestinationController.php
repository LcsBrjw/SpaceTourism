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
    public function index()
    {
        // Récupère toutes les destinations
        $destinations = Destination::all();

        // Retourne la réponse JSON avec les données des destinations
        return response()->json([
            'data' => $destinations,
        ], 200);
    }

    /**
     * Create a new destination
     *
     * This endpoint creates a new destination and returns the created resource.
     *
     * @response 201 {
     *  "data": {
     *    "id": 1,
     *    "name": "Destination Name",
     *    "description": "Description of the destination",
     *    "avgDist": 500,
     *    "timeTravel": 12,
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 400 {
     *  "error": "Validation error"
     * }
     */
    public function store(Request $request)
    {
        // Validation avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avgDist' => 'required|numeric',
            'timeTravel' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Créer une nouvelle destination
        $destination = Destination::create($request->all());

        // Retourne la réponse JSON avec la destination créée
        return response()->json([
            'data' => $destination,
        ], 201);
    }

    /**
     * Edit a destination by ID
     *
     * This endpoint retrieves a destination by ID and returns it.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Destination Name",
     *    "description": "Description of the destination",
     *    "avgDist": 500,
     *    "timeTravel": 12,
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Destination not found"
     * }
     */
    public function show($id)
    {
        // Récupère la destination par son ID
        $destination = Destination::find($id);

        // Si la destination n'est pas trouvée, renvoie une erreur 404
        if (!$destination) {
            return response()->json([
                'error' => 'Destination not found',
            ], 404);
        }

        // Retourne la destination trouvée
        return response()->json([
            'data' => $destination,
        ], 200);
    }

    /**
     * Update a destination by ID
     *
     * This endpoint updates a destination by ID and returns the updated resource.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Updated Destination Name",
     *    "description": "Updated description of the destination",
     *    "avgDist": 600,
     *    "timeTravel": 15,
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Destination not found"
     * }
     */
    public function update(Request $request, $id)
    {
        // Récupère la destination par son ID
        $destination = Destination::find($id);

        // Si la destination n'existe pas, renvoie une erreur 404
        if (!$destination) {
            return response()->json([
                'error' => 'Destination not found',
            ], 404);
        }

        // Validation des données avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avgDist' => 'required|numeric',
            'timeTravel' => 'required|numeric',
            'imageUrl' => 'nullable|string|url', // L'image est optionnelle
        ]);

        // Vérifie si la validation échoue
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Met à jour la destination avec les données validées
        $destination->update($request->all());

        // Retourne la réponse JSON avec la destination mise à jour
        return response()->json([
            'data' => $destination,
        ], 200);
    }

    /**
     * Delete a destination by ID
     *
     * This endpoint deletes a destination by ID and returns a confirmation.
     *
     * @response 200 {
     *  "message": "Destination deleted successfully"
     * }
     *
     * @response 404 {
     *  "error": "Destination not found"
     * }
     */
    public function destroy($id)
    {
        // Récupère la destination par son ID
        $destination = Destination::find($id);

        // Si la destination n'existe pas, renvoie une erreur 404
        if (!$destination) {
            return response()->json([
                'error' => 'Destination not found',
            ], 404);
        }

        // Supprime la destination
        $destination->delete();

        // Retourne un message de confirmation
        return response()->json([
            'message' => 'Destination deleted successfully',
        ], 200);
    }
}
