<?php

namespace App\Providers;

use Kirby\Cms\App as Kirby;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route as Route;

class KirbyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Kirby::class, function () {
            return new Kirby([
                'roots' => [
                    'content' => base_path('content'),
                    'site' => base_path('cms/site'),
                    'blueprints' => resource_path('blueprints'),
                    'config' => config_path('kirby'),
                    'kirby' => base_path('cms/kirby'),
                    'logs' => storage_path('logs/kirby'),
                    'media' => public_path('media'),
                    'plugins' => base_path('cms/plugins'),
                    'templates' => resource_path('views/templates'),
                    'snippets' => resource_path('views/snippets'),
                    'accounts' => base_path('cms/accounts'),
                    'sessions' => storage_path('kirby/sessions')
                ],
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::any('/{all}', function () {

            $kirbyResponse = resolve(Kirby::class)->render();

            return response(
                $kirbyResponse->body() ?? null,
                $kirbyResponse->code(),
                $kirbyResponse->headers()
            );

        })->where('all', '.*')->fallback();
    }
}