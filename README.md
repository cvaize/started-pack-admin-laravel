# started-pack-admin-laravel
Это стартовый пакет Laravel + Laratrust + Translation + Collective. Пакет тестировался на Laravel 5.6

# Внимание!!! Используйте этот пакет только на проект, который не содержит вашего кода. Команда на установку заменяет стандартные файлы

Вставьте это в файл `composer.json`
Это позволит вам избежать несостыковок в последующих обновлениях пакета
Это инструкция к пакету [vsch/laravel-translation-manager](https://github.com/vsch/laravel-translation-manager/wiki/Artisan-Commands)
Обязательно загляните на страницу artisan команд, это важно.

```php
"scripts": {
     "post-update-cmd": [
         ... other stuff ...
         "php artisan vendor:publish --provider=\"Vsch\\TranslationManager\\ManagerServiceProvider\" --tag=public --force",
         ... other stuff ...
     ]
 },
 
 ```