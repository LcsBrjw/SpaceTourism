<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'description' => $this->faker->paragraph(),
            'avgDist' => $this->faker->numberBetween(1000, 50000),
            'timeTravel' => $this->faker->randomElement(['1 day', '2 days', '3 days', '1 week']),
            'imageUrl' => $this->faker->imageUrl(),
        ];
    }
}
