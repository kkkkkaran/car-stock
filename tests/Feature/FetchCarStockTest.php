<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;
use Tests\TestCase;

class FetchCarStockTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var User
     */
    private $user;
    /**
     * @var string[]
     */
    private $carAttributes;

    public function setUp(): void
    {
        parent::setUp();

        Car::factory()->count(3)->create();
        $this->user = User::factory()->create();
        $this->carAttributes = ['id', 'model', 'manufacturer', 'year', 'stock_level'];
    }

    /** @test */
    public function allows_authenticated_user_to_view_all_cars_in_stock()
    {
        Passport::actingAs($this->user, ['view-stock']);

        $response = $this->get('api/car-stocks');

        $response->assertSuccessful();

        $stockData = json_decode($response->content())->data;

        $this->assertCount(Car::all()->count(), $stockData);

        foreach ($this->carAttributes as $attribute) {
            $this->assertObjectHasAttribute($attribute, $stockData[0]);
        }
    }

    /** @test */
    public function blocks_unauthorised_user()
    {
        $this->get('api/car-stocks')->assertRedirect();
    }
}
