<?php

namespace Database\Seeders;

use App\Models\Crew;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path('database/data/data.json'));
        $data = json_decode($json);

        foreach ($data->crew as $crew) {
            Crew::create([
                'role' => $crew->role,
                'name' => $crew->name,
                'description' => $crew->description,
                'image' => $crew->image
            ]);
        }
    }
}
