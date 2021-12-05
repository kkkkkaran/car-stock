<?php

namespace Database\Factories;

use App\Models\CarManufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->name(),
            'year' => $this->faker->year(),
            'manufacturer_id' => CarManufacturer::factory()->create(),
            'stock_level' => $this->faker->numberBetween(0,1000)
        ];
    }
}
