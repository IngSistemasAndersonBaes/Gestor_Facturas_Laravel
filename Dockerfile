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

# 1. Instalar librerías
RUN composer install --no-dev --optimize-autoloader

# 2. INYECTAR NUESTRA CONFIGURACIÓN DE NGINX (La Solución)
# Esto sobrescribe la configuración por defecto que está fallando
COPY nginx.conf /etc/nginx/sites-available/default.conf
# Aseguramos que Nginx la lea
RUN ln -sf /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf

# 3. Arranque "Todo en Uno"
# Publicamos Assets + Borramos Caché + Migramos BD + Iniciamos
CMD ["/bin/sh", "-c", "php artisan vendor:publish --tag=flux:assets --force && php artisan livewire:publish --assets && php artisan optimize:clear && php artisan migrate --force && /start.sh"]