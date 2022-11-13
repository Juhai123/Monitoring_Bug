## Instalasi Laravel Log Activity

- <b>composer require spatie/laravel-activitylog</b>
- Pastikan database sudah dibuat
- <b>php artisan config:clear</b>
- <b>php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"</b>
- <b>php artisan migrate</b>
- <b>php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"</b>
