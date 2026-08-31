#!/bin/sh

set -e

echo "======================================"
echo "Starting Laravel application"
echo "======================================"

# --------------------------------------------------
# Clear Laravel caches
# --------------------------------------------------

echo "Clearing Laravel cache..."

php artisan optimize:clear

# --------------------------------------------------
# Configure Apache port
# --------------------------------------------------

PORT=${PORT:-10000}

echo "Configuring Apache to use port: ${PORT}"

# Configure Apache ports.conf
sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf

# Configure Apache virtual host
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-available/000-default.conf

echo "Apache configured on port ${PORT}"

# --------------------------------------------------
# Start Apache
# --------------------------------------------------

echo "Starting Apache..."

exec apache2-foreground