#!/bin/bash

set -e

echo "Starting Laravel..."

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running migrations..."

php artisan migrate --force

echo "Fixing permissions..."

chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "Configuring Nginx on port ${PORT}..."

envsubst '${PORT}' \
    < /etc/nginx/sites-enabled/default.template \
    > /etc/nginx/sites-enabled/rendered.conf

rm -f /etc/nginx/sites-enabled/default.template

mv /etc/nginx/sites-enabled/rendered.conf \
   /etc/nginx/sites-enabled/default

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

exec nginx -g "daemon off;"
