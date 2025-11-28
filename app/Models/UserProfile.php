<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /** @use HasFactory<\Database\Factories\UserProfileFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role',
        
        'phone',
        'date_of_birth',
        'gender',

        'street',
        'city',
        'region',

        'license_number',
        'license_photo',

        'emergency_name',
        'emergency_phone',

        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
