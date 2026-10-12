FROM php:8.4-cli

RUN apt-get update && apt-get install -y git unzip libpq-dev libzip-dev nodejs npm \
    && docker-php-ext-install pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader \
    && npm ci && npm run build

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}