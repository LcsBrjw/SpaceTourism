<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * @group Technologies
     * 
     * API endpoints for managing technologies
     */
    
    /**
     * Get all technologies
     *
     * This endpoint returns a list of all technologies in the system.
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
    public function index()
    {
        // Récupère toutes les technologies
        $technologies = Technology::all();

        // Retourne la réponse JSON avec les données des technologies
        return response()->json([
            'data' => $technologies,
        ], 200);
    }

    /**
     * Create a new technology
     *
     * This endpoint creates a new technology and returns the created resource.
     *
     * @response 201 {
     *  "data": {
     *    "id": 1,
     *    "name": "Technology Name",
     *    "description": "Description of the technology",
     *    "imgMob": "https://example.com/mobile-image.jpg",
     *    "imgDesk": "https://example.com/desktop-image.jpg",
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
        // Validation des données avec Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'imgMob' => 'nullable|string|url',
            'imgDesk' => 'nullable|string|url',
        ]);
    
        // Vérifier si la validation échoue
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'message' => $validator->errors(),
            ], 400);
        }
    
        // Si la validation réussit, créer une nouvelle technologie
        $technology = Technology::create($validator->validated());
    
        // Retourne la réponse JSON avec la technologie créée
        return response()->json([
            'data' => $technology,
        ], 201);
    }

    /**
     * Edit a technology by ID
     *
     * This endpoint retrieves a technology by ID and returns it.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Technology Name",
     *    "description": "Description of the technology",
     *    "imgMob": "https://example.com/mobile-image.jpg",
     *    "imgDesk": "https://example.com/desktop-image.jpg",
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Technology not found"
     * }
     */
    public function show($id)
    {
        // Récupère la technologie par son ID
        $technology = Technology::find($id);

        // Si la technologie n'est pas trouvée, renvoie une erreur 404
        if (!$technology) {
            return response()->json([
                'error' => 'Technology not found',
            ], 404);
        }

        // Retourne la technologie trouvée
        return response()->json([
            'data' => $technology,
        ], 200);
    }

    /**
     * Update a technology by ID
     *
     * This endpoint updates a technology by ID and returns the updated resource.
     *
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Updated Technology Name",
     *    "description": "Updated description of the technology",
     *    "imgMob": "https://example.com/updated-mobile-image.jpg",
     *    "imgDesk": "https://example.com/updated-desktop-image.jpg",
     *    "created_at": "2025-04-23T14:00:00Z",
     *    "updated_at": "2025-04-23T14:00:00Z"
     *  }
     * }
     *
     * @response 404 {
     *  "error": "Technology not found"
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
            return response()->json([
                'error' => 'Validation error',
                'message' => $validator->errors(),
            ], 400);
        }
    
        // Trouver la technologie par son ID
        $technology = Technology::find($id);
    
        // Si la technologie n'existe pas, renvoie une erreur 404
        if (!$technology) {
            return response()->json([
                'error' => 'Technology not found',
            ], 404);
        }
    
        // Mettre à jour la technologie avec les données validées
        $technology->update($validator->validated());
    
        // Retourne la réponse JSON avec la technologie mise à jour
        return response()->json([
            'data' => $technology,
        ], 200);
    }

    /**
     * Delete a technology by ID
     *
     * This endpoint deletes a technology by ID and returns a confirmation.
     *
     * @response 200 {
     *  "message": "Technology deleted successfully"
     * }
     *
     * @response 404 {
     *  "error": "Technology not found"
     * }
     */
    public function destroy($id)
    {
        // Récupère la technologie par son ID
        $technology = Technology::find($id);

        // Si la technologie n'existe pas, renvoie une erreur 404
        if (!$technology) {
            return response()->json([
                'error' => 'Technology not found',
            ], 404);
        }

        // Supprime la technologie
        $technology->delete();

        // Retourne un message de confirmation
        return response()->json([
            'message' => 'Technology deleted successfully',
        ], 200);
    }
}
