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

        $this->publishes([
            __DIR__.'/Vendor/config' => base_path('config'),
            __DIR__.'/Vendor/routes' => base_path('routes'),
            __DIR__.'/Vendor/database' => base_path('database'),
            __DIR__.'/Vendor/app' => base_path('app'),
            __DIR__.'/Vendor/resources' => base_path('resources'),
            __DIR__.'/Vendor/routes' => base_path('routes'),
            __DIR__.'/Vendor/public' => base_path('public'),
            __DIR__.'/Sources/webpack.mix.js' => base_path('webpack.mix.js'),
        ], 'StartedPackAdminLaravel');
    }

    public function register()
    {
        Artisan::command('StartedPackAdminLaravel:init', function () {
            $this->info("StartedPackAdminLaravel Initialization");
            $cmd = 'php artisan StartedPackAdminLaravel:install';
            $cmd .= ' && php artisan StartedPackAdminLaravel:install';
            $cmd .= ' && php artisan StartedPackAdminLaravel:delete';
            $cmd .= ' && php artisan StartedPackAdminLaravel:publish';
            $cmd .= ' && php artisan StartedPackAdminLaravel:front';
            $cmd .= ' && php artisan StartedPackAdminLaravel:optima';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:install', function () {
            $this->info("StartedPackAdminLaravel install");
            $cmd = 'composer update';
            $cmd .= ' && php artisan make:auth';
            $cmd .= ' && composer require "santigarcor/laratrust:^5.0" "laravelcollective/html:^5.6.10" "fzaninotto/faker:^1.8.0" ';
            $cmd .= '"mcamara/laravel-localization:^1.3" "vsch/laravel-translation-manager:~2.6" "barryvdh/laravel-debugbar:^3.1"';
            $cmd .= ' && php artisan vendor:publish --tag="laratrust"';
            $cmd .= ' && php artisan laratrust:setup';
            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=migrations';
            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=config';
            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=public --force';
            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=lang';
            $cmd .= ' && php artisan vendor:publish --provider="Vsch\TranslationManager\ManagerServiceProvider" --tag=views';
            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:delete', function () {
            $this->info("StartedPackAdminLaravel Delete Files");
            $file = File::glob(base_path('database/migrations/*create_users_table.php'));
            if(!empty($file)){
                File::delete($file[0]);
            }
            File::deleteDirectory(base_path('app/Http/Controllers/Auth'));
            File::deleteDirectory(base_path('resources/views/auth'));
            File::deleteDirectory(base_path('app/Providers'));
            File::deleteDirectory(base_path('app/config'));
            File::delete([
                base_path('app/Permission.php'),
                base_path('app/Role.php'),
                base_path('app/User.php'),
                base_path('resources/views/layouts/app.blade.php'),
                base_path('resources/views/home.blade.php'),
                base_path('resources/views/welcome.blade.php'),
                base_path('resources/assets/js/app.js'),
                base_path('resources/assets/sass/app.scss'),
                base_path('routes/web.php'),
                base_path('bootstrap/app.php'),
                base_path('app/Http/Kernel.php'),
                base_path('database/seeds/DatabaseSeeder.php'),
                base_path('webpack.mix.js'),
            ]);
        });
        Artisan::command('StartedPackAdminLaravel:publish', function () {
            $this->info("StartedPackAdminLaravel publish");
            $date = date('Y_m_d_His');
            $migration_path = database_path("migrations/${date}_create_users_table.php");
            File::copy(__DIR__.'/Sources/migrations/create_users_table.php', $migration_path);
            $cmd = 'php artisan vendor:publish --tag="StartedPackAdminLaravel"';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:front', function () {
            $this->info("StartedPackAdminLaravel front");
            $cmd = 'npm i && npm remove axios bootstrap popper.js';
            $cmd .= ' && npm i axios popper.js bootstrap jquery-mask-plugin alertifyjs bootstrap-datepicker ';
            system($cmd);
        });
        Artisan::command('StartedPackAdminLaravel:optima', function () {
            $this->info("StartedPackAdminLaravel optimization");
            $cmd = 'composer dump-autoload';
            $cmd .= ' && composer update';
            $cmd .= ' && php artisan config:clear';
            system($cmd);
        });
    }


}
