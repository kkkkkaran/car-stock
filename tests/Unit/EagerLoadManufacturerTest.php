<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EagerLoadManufacturerTest extends TestCase
{
    /** @test */
    public function it_fetches_manufactuer_details_with_car()
    {
        Car::factory()->count(1)->create();

        $car = Car::first()->toArray();

        $this->assertArrayHasKey('manufacturer', $car);
    }
}
