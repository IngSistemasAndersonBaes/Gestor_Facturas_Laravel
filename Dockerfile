# Usamos una imagen que ya trae Nginx y PHP configurados para Laravel
FROM richarvey/nginx-php-fpm:latest

# Copiamos tu código al servidor
COPY . .

# Configuraciones para que la imagen sepa dónde está tu web
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configuraciones de Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permisos para que Composer pueda instalar dependencias
ENV COMPOSER_ALLOW_SUPERUSER 1

# Comando de inicio
CMD ["/start.sh"]