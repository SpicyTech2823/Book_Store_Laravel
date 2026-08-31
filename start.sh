#!/bin/sh

set -e

echo "Clearing Laravel cache..."

php artisan optimize:clear

echo "Starting Apache..."

exec apache2-foreground
