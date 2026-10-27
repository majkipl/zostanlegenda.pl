#!/bin/bash

cd /var/www/html

composer install --no-interaction --no-progress

echo "Waiting for MySQL database connection..."
until php -r "require __DIR__ . '/vendor/autoload.php'; \$app = require_once __DIR__ . '/bootstrap/app.php'; \$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); try { DB::connection()->getPdo(); exit(0); } catch (\Exception \$e) { exit(1); }" > /dev/null 2>&1; do
    echo "Waiting for database..."
    sleep 2
done

php artisan key:generate            # generujemy klucz
php artisan migrate:fresh --seed    # robimy migracje wraz z seed'ami #
php artisan cache:clear             # czyścimy cache
php artisan config:clear            # czyścimy konfiguracje
php artisan route:clear             # czyścimy routing

if [ ! -L /var/www/html/public/storage ]; then
    ln -sf ../storage/app/ /var/www/html/public/storage
fi

# Upewniamy sie, ze pliki wygenerowane przez artisan (logi, cache itp.) maja poprawne uprawnienia dla www-data
chown -R www-data:www-data /var/www/html/public /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 777 /var/www/html/public /var/www/html/storage /var/www/html/bootstrap/cache

# utrzymuje kontener przy życiu - nie zamyka apache
# wyświetla logi apacha
exec docker-php-entrypoint apache2-foreground
