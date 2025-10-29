# Proyecto CakePHP - INASE Lab

Este repositorio contiene la aplicación de carga y gestión de Muestras de Semillas para el laboratorio del INASE.

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
docker compose exec app bash -c 'cd /var/www/html/app && chmod +x runtests.sh && ./runtests.sh'
```

# Base de datos de ejemplo

El proyecto incluye scripts para crear y poblar la base de datos:

init-dev.sql → Crea la estructura de la base de datos (tablas, constraints, índices)

desarrollo.sql → Inserta datos de ejemplo

## Esquema de la base de datos

Resumen de tablas y relaciones:

<img width="703" height="287" alt="image" src="https://github.com/user-attachments/assets/4c3707ef-bdfd-401d-b347-7cd1a5d0f78d" />

# Guía de uso funcional
## Cargar una muestra

1. Ingresar a la aplicación en http://localhost:8080/muestras

2. Hacer clic en "Nueva muestra".

3. Completar los campos solicitados

    - Empresa: nombre de la empresa proveedora de la muestra

    - Especie: tipo de semilla.

    - Cantidad de semillas: Cantidad total de semillas

4. Guardar la informacion. Al guardar, el sistema:

    - Generará automáticamente un código de muestra único.

    - Registrará la fecha de creación y última modificación.

    - Mostrará la muestra en el listado principal para su consulta o edición posterior.

## Acciones asociadas a una muestra

Desde la sección de Muestras (http://localhost:8080/muestras) es posible consultar, editar o eliminar una muestra.

1. Ver detalle

- Muestra todos los campos registrados:

    - Código de muestra

    - Empresa

    - Especie

    - Cantidad de semillas

    - Fecha de creación y modificación

- También permite ver si la muestra tiene un resultado asociado.

- Si no hay resultado, aparecerá un botón "Crear resultado" que redirige al formulario para cargarlo.

2. Editar

- Permite modificar los datos de la muestra.

- Al guardar, se actualiza la fecha de modificación automáticamente.

3. Eliminar

- Borra la muestra del sistema.

- Se debe usar con cuidado, ya que se eliminarán también los resultados asociados si los hubiera.

## Cargar un resultado 

### Desde la sección de resultados

1. Ir a la sección de resultados: http://localhost:8080/resultados

2. Hacer clic en "Nuevo resultado".

3. Seleccionar la muestra correspondiente.

4. Completar:

    - Poder germinativo

    - Pureza

    - (Opcional) Materiales inertes

5. Guardar. Al guardar un resultado:

    - Se asocia a la muestra indicada.

    - El sistema registra fecha de creación y fecha de modificación automáticamente.

### Alternativa desde el detalle de una muestra

También es posible cargar el resultado desde el detalle de una muestra que aún no tenga resultados.

1. Ir a http://localhost:8080/muestras

2. Seleccionar la muestra y hacer clic en "Ver detalle".

3. Si la muestra no tiene un resultado asociado, aparecerá el botón "Cargar resultado". Presionar el botón "Cargar resultado", que redirige al mismo formulario mencionado arriba.

## Ver los reportes

1. Ir a la sección de reportes:
http://localhost:8080/reportes

2. Completar los filtros disponibles (opcionales):
    - Especie

    - Fecha desde

    - Fecha hasta

3. Hacer clic en "Buscar" para generar el reporte.

### Contenido del reporte

Cada fila del reporte muestra:

| Campo                               | Descripción                                             |
| ----------------------------------- | ------------------------------------------------------- |
| **Código de muestra**               | Identificador único generado por el sistema             |
| **Empresa**                         | Empresa que entregó la muestra                          |
| **Especie**                         | Tipo de semilla                                         |
| **Poder germinativo**               | Valor ingresado en el resultado                         |
| **Pureza**                          | Valor ingresado en el resultado                         |
| **Materiales inertes**              | Valor ingresado en el resultado                         |
| **Fecha de creación del resultado** | Fecha registrada automáticamente al cargar el resultado |

### Notas

- Si no se completan filtros, el sistema mostrará todas las muestras con resultados cargados.

- Se pueden combinar filtros para, por ejemplo:

    - Ver resultados de una sola especie.

    - Consultar muestras procesadas entre dos fechas.

    - Analizar la evolución de resultados en un período.