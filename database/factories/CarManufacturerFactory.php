<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $manufacturers = [
            'Alfa Romeo',
            'Maserati',
            'Fiat',
            'Chrysler',
            'Jeep',
            'Ferrari'
        ];

        return [
            'name' => $manufacturers[array_rand($manufacturers)]
        ];
    }
}
