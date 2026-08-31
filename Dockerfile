# PHP + Apache
FROM php:8.2-apache

# --------------------------------------------------
# 1. Install system dependencies
# --------------------------------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    && rm -rf /var/lib/apt/lists/*

# --------------------------------------------------
# 2. Enable Apache rewrite
# --------------------------------------------------
RUN a2enmod rewrite

# --------------------------------------------------
# 3. Install Composer
# --------------------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# --------------------------------------------------
# 4. Install Node.js + npm
# --------------------------------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# --------------------------------------------------
# 5. Set Laravel working directory
# --------------------------------------------------
WORKDIR /var/www/html

# --------------------------------------------------
# 6. Copy Laravel project
# --------------------------------------------------
COPY . .

# --------------------------------------------------
# 7. Install PHP dependencies
# --------------------------------------------------
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# --------------------------------------------------
# 8. Install JavaScript dependencies
# --------------------------------------------------
RUN npm install

# --------------------------------------------------
# 9. Build Vite
# --------------------------------------------------
RUN npm run build

# --------------------------------------------------
# 10. Configure Apache document root
# --------------------------------------------------
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# --------------------------------------------------
# 11. Set Laravel permissions
# --------------------------------------------------
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# --------------------------------------------------
# 12. Copy startup script
# --------------------------------------------------
COPY start.sh /usr/local/bin/start.sh

# Make startup script executable
RUN chmod +x /usr/local/bin/start.sh

# --------------------------------------------------
# 13. Expose Render's default port
# --------------------------------------------------
EXPOSE 10000

# --------------------------------------------------
# 14. Start Laravel + Apache
# --------------------------------------------------
CMD ["/usr/local/bin/start.sh"]