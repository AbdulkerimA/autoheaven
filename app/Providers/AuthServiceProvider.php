<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Car;
use App\Policies\CarOwnerPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Car::class => CarOwnerPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
