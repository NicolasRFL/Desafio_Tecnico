# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Variables de entorno de Apache para que mod_rewrite funcione
ENV APACHE_DOCUMENT_ROOT=/var/www/html/app/webroot

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Instalar extensiones necesarias de PHP para CakePHP y MySQL
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install intl mbstring pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar el código de la aplicación al contenedor
WORKDIR /var/www/html
COPY ./app /var/www/html/app

# Ejecutar composer install en la carpeta app
RUN cd /var/www/html/app && composer install --no-interaction --prefer-dist

# Dar permisos adecuados
RUN chown -R www-data:www-data /var/www/html/app \
    && chmod -R 755 /var/www/html/app

# Exponer el puerto 80
EXPOSE 80

# Copiar configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copiar entrypoint
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Comando por defecto
CMD ["entrypoint.sh"]