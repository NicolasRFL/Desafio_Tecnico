# Proyecto CakePHP - INASE Lab

Este repositorio contiene la aplicación de carga de Semillas para el laboratorio de INASE.

## Levantar el proyecto localmente

### Requisitos

- [Docker](https://www.docker.com/) y [Docker Compose](https://docs.docker.com/compose/)
- Variables de entorno definidas en `.env`:

```text
DB_USER=usuario
DB_PASS=contraseña
ROOT_PASS=rootpassword
```

# Pasos para levantar la aplicación

## Clonar el repositorio:

git clone https://github.com/NicolasRFL/Desafio_Tecnico.git

cd Desafio_Tecnico


## Levantar los contenedores:

```text
docker compose up --build
```

## Esto iniciará los servicios:

app: la aplicación CakePHP en http://localhost:8080

db: base de datos MySQL

phpmyadmin: interfaz web de la base de datos en http://localhost:8081

Nota: La base de datos se inicializa automáticamente usando los scripts init-dev.sql y desarrollo.sql que se encuentran en la raíz del proyecto.

## Ejecutar tests de modelo (opcional):

```text
docker compose exec app bash -c './runtests.sh'
```

# Base de datos de ejemplo

El proyecto incluye scripts para crear y poblar la base de datos:

init-dev.sql → Crea la estructura de la base de datos (tablas, constraints, índices)

desarrollo.sql → Inserta datos de ejemplo

## Esquema de la base de datos

Resumen de tablas y relaciones:

<img width="703" height="287" alt="image" src="https://github.com/user-attachments/assets/4c3707ef-bdfd-401d-b347-7cd1a5d0f78d" />
