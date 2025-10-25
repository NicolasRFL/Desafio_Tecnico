FROM php:8.2-apache

# Instalación de dependencias necesarias para intl
RUN apt-get update && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Evitar warning ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html