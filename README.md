## Instalasi Laravel Log Activity

- composer require spatie/laravel-activitylog
- Pastikan database sudah dibuat
- php artisan config:clear
- php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"
- php artisan migrate
- php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"
