<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class VoltServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Volt::mount([

            resource_path('views/auth'),
            resource_path('views/admin'),
            resource_path('views/certificates'),


            resource_path('views/livewire'),
            resource_path('views/components'),
            resource_path('views/flux'),
        ]);
    }
}

