FROM richarvey/nginx-php-fpm:latest

COPY . .

# Configuraciones
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# 1. Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# 2. BORRADO FÍSICO DE CACHÉ (Nuclear)
# Eliminamos los archivos que "atoran" a Laravel
RUN rm -f /var/www/html/bootstrap/cache/*.php

# 3. ARRANQUE
# Publicamos los assets que faltaban en tus logs y arrancamos
CMD ["/bin/sh", "-c", "php artisan livewire:publish --assets && php artisan vendor:publish --tag=flux:assets --force && php artisan route:clear && php artisan view:clear && /start.sh"]