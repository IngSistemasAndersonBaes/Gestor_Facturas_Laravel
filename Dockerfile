FROM richarvey/nginx-php-fpm:latest

# Copiamos todo el código
COPY . .

# Configuraciones Críticas
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# --- LA CLAVE DEL ÉXITO ---
# 1. Aseguramos que SKIP_COMPOSER sea 0 para que NO se salte la instalación si falla el paso manual
ENV SKIP_COMPOSER 0

# 2. Instalamos las librerías manualmente AHORA MISMO
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 3. Permisos correctos (Para que Nginx pueda leer los archivos)
RUN chown -R www-data:www-data /var/www/html

# 2. COMANDO DE ARRANQUE "TODO EN UNO"
#    - Publica los archivos de Flux y Livewire (Arregla el error de logs)
#    - Borra TODAS las cachés (Arregla el error 404 del Login)
#    - Migra la base de datos
#    - Inicia el servidor
CMD ["/bin/sh", "-c", "php artisan vendor:publish --tag=flux:assets --force && php artisan livewire:publish --assets && php artisan optimize:clear && php artisan route:clear && php artisan migrate --force && /start.sh"]