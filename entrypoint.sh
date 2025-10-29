#!/bin/bash
set -e

# Ruta del archivo de configuración
CONFIG_FILE=/var/www/html/app/config/app_local.php
DEFAULT_FILE=/var/www/html/app/config/app_local.example.php

# Si no existe app_local.php, crear a partir del default
if [ ! -f "$CONFIG_FILE" ]; then
    cp "$DEFAULT_FILE" "$CONFIG_FILE"

    # Reemplazar valores por variables de entorno
    sed -i "s/'host' => .*/'host' => env('DATABASE_HOST', '${DATABASE_HOST}'),/" "$CONFIG_FILE"
    sed -i "s/'username' => .*/'username' => env('DATABASE_USER', '${DATABASE_USER}'),/" "$CONFIG_FILE"
    sed -i "s/'password' => .*/'password' => env('DATABASE_PASSWORD', '${DATABASE_PASSWORD}'),/" "$CONFIG_FILE"
    sed -i "s/'database' => .*/'database' => env('DATABASE_NAME', '${DATABASE_NAME}'),/" "$CONFIG_FILE"
    sed -i "s/'salt' => .*/'salt' => env('SECURITY_SALT', '${SECURITY_SALT}'),/" "$CONFIG_FILE"

    echo "app_local.php generado automáticamente."
fi

# Ejecutar Apache en primer plano
exec apache2-foreground