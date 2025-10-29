# Proyecto CakePHP - INASE Lab

Este repositorio contiene la aplicación de carga de Semillas para el laboratorio de INASE.

---

## Levantar el proyecto localmente

### Requisitos

- [Docker](https://www.docker.com/) y [Docker Compose](https://docs.docker.com/compose/)
- Variables de entorno definidas en `.env`:

```text
DB_USER=usuario
DB_PASS=contraseña
ROOT_PASS=rootpassword

# Pasos para levantar la aplicación

## Clonar el repositorio:

git clone https://github.com/usuario/nombre-del-proyecto.git
cd nombre-del-proyecto


## Levantar los contenedores:

docker compose up --build


## Esto iniciará los servicios:

app: la aplicación CakePHP en http://localhost:8080

db: base de datos MySQL

phpmyadmin: interfaz web de la base de datos en http://localhost:8081

Nota: La base de datos se inicializa automáticamente usando los scripts init-dev.sql y desarrollo.sql que se encuentran en la raíz del proyecto.

## Ejecutar tests de modelo (opcional):

docker compose exec app bash -c './runtests.sh'

# Base de datos de ejemplo

El proyecto incluye scripts para crear y poblar la base de datos:

init-dev.sql → Crea la estructura de la base de datos (tablas, constraints, índices)

desarrollo.sql → Inserta datos de ejemplo

## Esquema de la base de datos

Resumen de tablas y relaciones:
