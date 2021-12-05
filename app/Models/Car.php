<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * @package App\Models
 * @property int id
 * @property string model
 * @property int manufacturer_id
 * @property string year
 * @property int stock_level
 */

class Car extends Model
{
    use HasFactory;

    protected $with = ['manufacturer'];

    public function manufacturer()
    {
        return $this->belongsTo(CarManufacturer::class, 'manufacturer_id', 'id');
    }
}
