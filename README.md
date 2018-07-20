# started-pack-admin-laravel
Это стартовый пакет Laravel + Laratrust + Translation + Collective. Пакет тестировался на Laravel 5.6

# Внимание!!! Используйте этот пакет только на проект, который не содержит вашего кода. Команда на установку заменяет стандартные файлы

Вставьте это в файл `composer.json`

```
"scripts": {
     "post-update-cmd": [
         ... other stuff ...
         "php artisan vendor:publish --provider=\"Vsch\\TranslationManager\\ManagerServiceProvider\" --tag=public --force",
         ... other stuff ...
     ]
 },
 
 ```