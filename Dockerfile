FROM richarvey/nginx-php-fpm:latest

# Copiamos el código
COPY . .

# Variables de entorno para producción
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Comando simple y seguro: Solo inicia el servidor
CMD ["/start.sh"]