<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarStockRequest;
use App\Http\Requests\UpdateCarStockRequest;
use App\Http\Resources\CarStockResource;
use App\Models\Car;
use App\Models\CarManufacturer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CarStockResource::collection(Car::all());
    }
}
