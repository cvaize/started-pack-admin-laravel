# started-pack-admin-laravel
Это стартовый пакет Laravel + Laratrust + Translation + Collective. Пакет тестировался на Laravel 5.6

# Внимание!!! Используйте этот пакет только на проект, который не содержит вашего кода. Команда на установку заменяет стандартные файлы

1) Установка пакета `composer require cvaize/started-pack-admin-laravel`

2) Команда инициализации `php artisan StartedPackAdminLaravel:init`

3) Вставьте это в файл `composer.json`. Это позволит вам избежать несостыковок в последующих обновлениях пакета `vsch/laravel-translation-manager`


```php
"scripts": {
     "post-update-cmd": [
         ... other stuff ...
         "php artisan vendor:publish --provider=\"Vsch\\TranslationManager\\ManagerServiceProvider\" --tag=public --force",
         ... other stuff ...
     ]
 },
 
 ```
 
Инструкция к пакету [vsch/laravel-translation-manager](https://github.com/vsch/laravel-translation-manager/wiki/Artisan-Commands)
 
Обязательно загляните на страницу artisan команд, это важно!

Список устанавливаемых пакетов:

1) `"santigarcor/laratrust:^5.0"`
2) `"laravelcollective/html:^5.6.10"`
3) `"fzaninotto/faker:^1.8.0"`
4) `"mcamara/laravel-localization:^1.3"`
5) `"vsch/laravel-translation-manager:~2.6"`
6) `"barryvdh/laravel-debugbar:^3.1"`

Список удаляемых директорий и файлов:
```php
File::deleteDirectory(base_path('app/Http/Controllers/Auth'));
File::deleteDirectory(base_path('resources/views/auth'));
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
]);
 
 ```
 При желании можете заглянуть в код пакета и выполнить только те команды которые вам необходимы.
 
 