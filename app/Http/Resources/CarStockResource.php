<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class CarStockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Car
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'manufacturer' => $this->manufacturer->name,
            'year' => $this->year,
            'stock_level' => $this->stock_level
        ];
    }
}
