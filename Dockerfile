FROM php:8.2-cli

# Install system dependencies & PostgreSQL drivers
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy application files
COPY . .

# Install PHP and Node dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Set permissions for Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 10000

# Run migrations and start Laravel server
CMD ["sh", "-c", "php artisan config:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
