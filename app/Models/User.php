<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'address',
        'password',
        'profile_picture',
        'has_profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // OWNERS → Cars they own
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    
    // OWNERS → Cars they own
    public function cars()
    {
        return $this->hasMany(Car::class, 'owner_id');
    }


    // CUSTOMERS → Bookings they made
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }

    // CUSTOMERS → Reviews they wrote
    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_id');
    }

    // CUSTOMERS → Transactions via bookings
    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Booking::class, 'customer_id', 'booking_id');
    }
}
