<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'title',
        'brand',
        'category',
        'fuel_type',
        'transmission',
        'price_per_day',
        'year',
        'description',
        'status', // available, booked, maintenance
    ];

    /** -------------------------
     *   RELATIONSHIPS
     *  ------------------------- */

    // CAR → Owner (User)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // CAR → Media Files
    public function media()
    {
        return $this->hasMany(CarMedia::class);
    }

    // CAR → Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // CAR → Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
