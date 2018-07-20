<?php

namespace StartedPackAdminLaravel;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class StartedPackAdminLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        Artisan::command('StartedPackAdminLaravel:init', function () {
            $this->info("StartedPackAdminLaravel Initialization");
            $cmd = 'php artisan StartedPackAdminLaravel:install';
//            $cmd .= ' && php artisan ladmin:routes';
//            $cmd .= ' && php artisan ladmin:install';
//            $cmd .= ' && php artisan ladmin:publish:laratrust';
//            $cmd .= ' && php artisan ladmin:files:delete';
//            $cmd .= ' && php artisan ladmin:publish:config';
//            $cmd .= ' && php artisan ladmin:publish:front';
//            $cmd .= ' && php artisan ladmin:publish:admin';
//            $cmd .= ' && php artisan ladmin:migration';
//            $cmd .= ' && php artisan ladmin:cache';
//            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:install', function () {
            $this->info("StartedPackAdminLaravel install");
            $cmd = 'composer update';
            $cmd .= '&& php artisan make:auth';
            $cmd .= '&& composer require "santigarcor/laratrust:^5.0" "laravelcollective/html:^5.6.10" "fzaninotto/faker:^1.8.0" ';
            $cmd .= '"mcamara/laravel-localization:^1.3" "vsch/laravel-translation-manager:~2.6" "barryvdh/laravel-debugbar:^3.1"';
            system($cmd);
        });
    }


}
