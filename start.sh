#!/bin/sh
#!/bin/bash

echo "Clearing Laravel cache..."
php artisan optimize:clear

echo "Running database migrations..."
php artisan migrate --force

echo "Starting Apache..."
exec apache2-foreground
