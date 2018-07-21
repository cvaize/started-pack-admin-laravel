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
//        Artisan::command('StartedPackAdminLaravel:init', function () {
//            $this->info("StartedPackAdminLaravel Initialization");
//            $cmd = 'php artisan StartedPackAdminLaravel:install';
//            $cmd .= ' && php artisan StartedPackAdminLaravel:install';
//            $cmd .= ' && php artisan StartedPackAdminLaravel:replace';
//            $cmd .= ' && php artisan StartedPackAdminLaravel:front';
//            system($cmd);
//        });
        Artisan::command('StartedPackAdminLaravel:install', function () {
            $this->info("StartedPackAdminLaravel install");
            $cmd = 'composer update';
            $cmd .= ' && php artisan make:auth';
            $cmd .= ' && composer require "santigarcor/laratrust:^5.0"';
            $cmd .= ' && composer require "laravelcollective/html:^5.6.10"';
            $cmd .= ' && composer require "fzaninotto/faker:^1.8.0"';
            $cmd .= ' && composer require "mcamara/laravel-localization:^1.3"';
            $cmd .= ' && composer require "vsch/laravel-translation-manager:~2.6"';
            $cmd .= ' && composer require "barryvdh/laravel-debugbar:^3.1"';
//            $cmd .= ' && php artisan vendor:publish --tag="laratrust"';
            $cmd .= ' && php artisan laratrust:setup';
//            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=migrations';
//            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=config';
//            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=public --force';
//            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=lang';
//            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=views';
            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:replace', function () {
            $this->info("StartedPackAdminLaravel Replace All Files");

            File::deleteDirectory(base_path('app'));
            File::deleteDirectory(base_path('bootstrap'));
            File::deleteDirectory(base_path('config'));
            File::deleteDirectory(base_path('database'));
            File::deleteDirectory(base_path('public'));
            File::deleteDirectory(base_path('resources'));
            File::deleteDirectory(base_path('routes'));
            File::delete([
                base_path('webpack.mix.js'),
            ]);
            File::copyDirectory(__DIR__.'/Vendor/app', base_path('app'));
            File::copyDirectory(__DIR__.'/Vendor/bootstrap', base_path('bootstrap'));
            File::copyDirectory(__DIR__.'/Vendor/config', base_path('config'));
            File::copyDirectory(__DIR__.'/Vendor/database', base_path('database'));
            File::copyDirectory(__DIR__.'/Vendor/resources', base_path('resources'));
            File::copyDirectory(__DIR__.'/Vendor/routes', base_path('routes'));
            File::copyDirectory(__DIR__.'/Vendor/public', base_path('public'));
            File::copy(__DIR__.'/Vendor/webpack.mix.js', base_path('webpack.mix.js'));
            $cmd = 'composer update';
            $cmd .= ' && php artisan cache:clear';
            $cmd .= ' && php artisan config:clear';
            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:front', function () {
            $this->info("StartedPackAdminLaravel front");
            $cmd = 'npm i && npm remove axios bootstrap popper.js';
            $cmd .= ' && npm i axios popper.js bootstrap jquery-mask-plugin alertifyjs bootstrap-datepicker';
            $cmd .= ' && npm run dev';
            system($cmd);
        });
    }


}
