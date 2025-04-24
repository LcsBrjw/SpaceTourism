<?php

namespace Database\Factories;

use App\Models\Crew;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrewFactory extends Factory
{
    protected $model = Crew::class;

    public function definition()
    {
        return [
            'role' => $this->faker->jobTitle(),
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
