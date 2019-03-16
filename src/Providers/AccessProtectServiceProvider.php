<?php
/*
 * This file is part of Laravel Access Protect.
 *
 * (c) Goran Krgovic <gorankrgovic1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);


namespace Gox\Laravel\AccessProtect\Providers;


use Illuminate\Support\ServiceProvider;

class AccessProtectServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'access-protect');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/access-protect'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../../config' => config_path(),
        ], 'config');
    }

    /**
     * Register bindings in the container.
     */
    public function register() {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/access-protect.php', 'access-protect'
        );
    }
}