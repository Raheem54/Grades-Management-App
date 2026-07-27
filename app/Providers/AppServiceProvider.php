<?php

namespace App\Providers;

use App\Contracts\DegreesOCRInterface;
use App\services\DegreesOCR\AiPrompt;
use App\services\DegreesOCR\GeminiService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DegreesOCRInterface::class,function ($app){
            if (request()->routeIs('Gemini')) {
                return $app->make(GeminiService::class);
            }
            if (request()->routeIs('Prompt')) {
                return $app->make(AiPrompt::class);
            }
            
        } );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role == "admin"; 
        });
    }
}
