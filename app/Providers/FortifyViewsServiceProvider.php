<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyViewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        Fortify::registerView(fn () => view('auth.register'));
    }

    public function boot(): void
    {
        Fortify::loginView(fn () => view('auth.login'));
    }
}
