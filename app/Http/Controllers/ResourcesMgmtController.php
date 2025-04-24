<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use App\Models\Destination;
use App\Models\Technology;

class ResourcesMgmtController extends Controller
{
    /**
 * @group Dashboards
 * 
 * API endpoints for managing dashboards
 */

/**
 * Get all dashboards
 *
 * This endpoint returns a list of all dashboards in the system.
 *
 * @response 200 {
 *  "data": [
 *    {
 *      "id": 1,
 *      "name": "Dashboard Name",
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
        return view('resourcesMgmt', [
            'crew' => Crew::all(),
            'destinations' => Destination::all(),
            'technologies' => Technology::all(),
        ]);
    }

 
}
