# started-pack-admin-laravel
Это стартовый пакет Laravel + Laratrust + Translation + Collective. Пакет тестировался на Laravel 5.6

# Внимание!!! Используйте этот пакет только на проект, который не содержит вашего кода. Команда на установку заменяет стандартные файлы

1) Установка пакета `composer require cvaize/started-pack-admin-laravel`

2) Команда инициализации `php artisan StartedPackAdminLaravel:init`

3) Настройте подключение к базе данных. Выполните миграции. Вы так же можете выполнить посев, для посева демо данных.

4) Вставьте это в файл `composer.json`. Это позволит вам избежать несостыковок в последующих обновлениях пакета `vsch/laravel-translation-manager`
```php
"scripts": {
     "post-update-cmd": [
         ... other stuff ...
         "php artisan vendor:publish --provider=\"Vsch\\TranslationManager\\ManagerServiceProvider\" --tag=public --force",
         ... other stuff ...
     ]
 },
 
 ```

### На этом установка окончена
 
Инструкция к пакету [vsch/laravel-translation-manager](https://github.com/vsch/laravel-translation-manager/wiki/Artisan-Commands)
 
Обязательно загляните на страницу artisan команд пакета `vsch/laravel-translation-manager`, это важно!

Список устанавливаемых пакетов:

1) `"santigarcor/laratrust:^5.0"`
2) `"laravelcollective/html:^5.6.10"`
3) `"fzaninotto/faker:^1.8.0"`
4) `"mcamara/laravel-localization:^1.3"`
5) `"vsch/laravel-translation-manager:~2.6"`
6) `"barryvdh/laravel-debugbar:^3.1"`

Список заменяемых директорий и файлов:

1. /app
2. /bootstrap
3. /config
4. /database
5. /public
6. /resources
7. /routes
8. /webpack.mix.js

Список обновляемых/устанавливаемых пакетов npm:

1. bootstrap
2. popper.js
3. axios
4. jquery-mask-plugin
5. alertifyjs
6. bootstrap-datepicker


 
 
 