# Usamos la imagen base que ya tiene PHP y Nginx
FROM richarvey/nginx-php-fpm:latest

# Copiamos el código
COPY . .

# --- NUEVA SECCIÓN: Instalar Node.js y construir los estilos ---
# 1. Instalamos Node y NPM en el servidor Linux (Alpine)
RUN apk add --update nodejs npm

# 2. Instalamos las dependencias de javascript (package.json)
RUN npm install

# 3. Construimos los archivos finales (CSS y JS) para producción
RUN npm run build
# -------------------------------------------------------------

# Configuraciones de la imagen
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 0
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configuraciones de Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Iniciar el servidor
CMD ["/start.sh"]