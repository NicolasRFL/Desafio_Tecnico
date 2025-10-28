#!/bin/bash
set -e
# Migraciones en test
cd "app"
bin/cake migrations migrate --connection test

# Ejecutar tests
vendor/bin/phpunit