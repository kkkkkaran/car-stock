<?php

namespace Tests\Unit;

use App\Models\Car;
use Tests\TestCase;

class EagerLoadManufacturerTest extends TestCase
{
    /** @test */
    public function it_fetches_manufacturer_details_with_car()
    {
        Car::factory()->count(1)->create();

        $car = Car::first()->toArray();

        $this->assertArrayHasKey('manufacturer', $car);
    }
}
