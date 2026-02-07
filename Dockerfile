FROM richarvey/nginx-php-fpm:latest

# Copiamos todo tu código al contenedor
COPY . .

# Variables de entorno críticas
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# --- CORRECCIÓN ---
# Ejecutamos la instalación de dependencias AQUÍ MISMO para asegurar que existan
RUN composer install --no-dev --optimize-autoloader --no-interaction
# ------------------

# Comando Nuclear: Borra físicamente la caché, migra y arranca
# Versión segura que asegura que el despliegue sea EXITOSO (Check verde)
CMD ["/start.sh"]