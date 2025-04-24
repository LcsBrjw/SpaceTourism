<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path('database/data/data.json'));
        $data = json_decode($json);

        foreach ($data->destinations as $destination) {
            Destination::create([
                'name' => $destination->name,
                'timeTravel' => $destination->timeTravel,
                'avgDist' => $destination->avgDist,
                'description' => $destination->description,
                'imageUrl' => $destination->imageUrl
            ]);
        }
    }
}
