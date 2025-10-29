#!/bin/bash
set -e
# Migraciones en test
bin/cake migrations migrate --connection test

# Ejecutar tests
vendor/bin/phpunit