#!/bin/bash

set -e

echo "Starting Laravel..."

# Clear old Laravel caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run database migrations
php artisan migrate --force

# Cache Laravel configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
php-fpm -D

# Start Nginx
nginx -g "daemon off;"