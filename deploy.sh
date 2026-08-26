#!/bin/sh

# Optimize configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force

# Start PHP-FPM & Nginx
php-fpm -D && nginx -g "daemon off;"
