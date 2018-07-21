# started-pack-admin-laravel
Это стартовый пакет Laravel + Laratrust + Translation + Collective. Пакет тестировался на Laravel 5.6

# Внимание!!! Используйте этот пакет только на проект, который не содержит вашего кода. Команда на установку заменяет стандартные файлы

1) Установка пакета `composer require cvaize/started-pack-admin-laravel`

2) Команда установки пакетов composer `php artisan StartedPackAdminLaravel:install`

3) Команда замены файлов `php artisan StartedPackAdminLaravel:replace`

4) Команды чтобы подтянуть зависимости `composer update && php artisan cache:clear && php artisan config:clear`

5) Команды установки фронта `php artisan StartedPackAdminLaravel:front`

6) Настройте подключение к базе данных в файле `.env`. Выполните миграции `php artisan migrate`. Вы так же можете выполнить посев  `php artisan db:seed`, для посева демо данных.

7) Выполните импорт языковых переменных `php artisan translations:import`

8) Вставьте это в файл `composer.json`. Это позволит вам избежать несостыковок в последующих обновлениях пакета `vsch/laravel-translation-manager`
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


 
 
 