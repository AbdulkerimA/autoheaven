<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMedia extends Model
{
    /** @use HasFactory<\Database\Factories\CarMediaFactory> */
    use HasFactory;
     protected $fillable = [
        'car_id',
        'file_path',
    ];

    /** -------------------------
     *   RELATIONSHIPS
     *  ------------------------- */

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
