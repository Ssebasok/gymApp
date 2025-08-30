FROM php:8.3-apache

# Activar mod_rewrite y dependencias necesarias
RUN a2enmod rewrite \
 && apt-get update && apt-get install -y git unzip libzip-dev libicu-dev libonig-dev \
 && docker-php-ext-install pdo pdo_mysql bcmath intl zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar el proyecto Laravel al contenedor
COPY . /var/www/html

# Configurar DocumentRoot en /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Preparar Laravel
RUN [ -f .env ] || cp .env.example .env \
 && composer install --no-dev --optimize-autoloader \
 && php artisan key:generate --force || true \
 && php artisan config:cache || true \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
