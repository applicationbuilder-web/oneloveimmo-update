<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Exigences de sécurité strictes pour les mots de passe
        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->numbers();
        });

        View::composer('*', function ($view) {

            $settings = SiteSetting::first();

            $view->with('settings', $settings);

        });
    }
}