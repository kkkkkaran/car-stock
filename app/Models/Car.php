<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function manufacturer()
    {
        return $this->belongsTo(CarManufacturer::class, 'manufacturer_id', 'id');
    }
}
