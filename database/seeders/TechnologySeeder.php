<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(base_path('database/data/data.json'));
        $data = json_decode($json);

        foreach ($data->technology as $technology) {
            Technology::create([
                'name' => $technology->name,
                'description' => $technology->description,
                'imgMob' => $technology->imgMob,
                'imgDesk' => $technology->imgDesk
            ]);
        }
    }
}
