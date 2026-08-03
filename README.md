# Librería Online

Aplicación web para consultar el listado de libros y autores de una librería, con un formulario de contacto.

## Tecnologías

- HTML5
- CSS3
- JavaScript
- PHP 8.2
- MySQL 8.0
- PDO
- Bootstrap 5
- Docker
- VS Code Dev Containers

## Requisitos

- Docker Desktop
- Visual Studio Code
- Extensión Dev Containers de VS Code

## Cómo ejecutar el proyecto

1. Clona el repositorio.
2. Abre la carpeta del proyecto en VS Code.
3. Presiona `F1` y selecciona `Dev Containers: Rebuild and Reopen in Container`.
4. Espera a que VS Code construya y levante los contenedores.
5. Abre un navegador y visita `http://localhost:8080`.

## Servicios disponibles
|----------------------------------|
| Servicio | URL | Puerto externo |
|----------|-----|----------------|
| Aplicación web | http://localhost:8080 | 8080 |
| phpMyAdmin | http://localhost:8081 | 8081 |
| MySQL | localhost | 3307 |

## Estructura de archivos
```
.
├── .devcontainer/         # Archivos de configuración de VS Code Dev Containers
├── .docker/               # Scripts de inicialización de MySQL
├── css/                   # Estilos personalizados
├── includes/              # Header, footer y conexión PDO
├── js/                    # Scripts de JavaScript
├── index.php              # Página de inicio
├── libros.php             # Listado de libros
├── autores.php            # Listado de autores
└── contacto.php           # Formulario de contacto
```

## Base de datos

La base de datos `dblibreria` se inicializa automáticamente al crear el contenedor de MySQL. Incluye las tablas originales del proyecto y la tabla `contacto` para almacenar los mensajes del formulario.

## Funcionalidades

- Listado de todos los libros disponibles.
- Listado de todos los autores.
- Formulario de contacto que guarda los datos en la base de datos.
- Validación del formulario con JavaScript y PHP.
- Conexión a la base de datos mediante PDO.

## Autor Yoel Lebron - 20250051

Proyecto desarrollado para el curso de Programación Web.
