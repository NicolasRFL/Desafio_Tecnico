# Imagen base con PHP 8.2 + extensiones necesarias
FROM php:8.2-apache

# Instalar extensiones de PHP que CakePHP necesita
RUN apt-get update && apt-get upgrade -y && apt-get install -y --no-install-recommends \
    ca-certificates libicu-dev libzip-dev unzip git \
    && docker-php-ext-install intl pdo_mysql zip opcache \
    && a2enmod rewrite \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurar Apache para permitir URLs amigables
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copiar archivos del proyecto
COPY . /var/www/html

# Instalar Composer dentro del contenedor
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar dependencias del proyecto
WORKDIR /var/www/html
# RUN composer install --no-interaction --prefer-dist

# Permisos para logs y tmp
# RUN chown -R www-data:www-data /var/www/html/tmp /var/www/html/logs