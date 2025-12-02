<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    
    protected $fillable = [
        'car_id',
        'customer_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
        'payment_status',
    ];

    /** -------------------------
     *   RELATIONSHIPS
     *  ------------------------- */

    // BOOKING → Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // BOOKING → Customer
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // BOOKING → Transaction
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
