# Mi Proyecto Web

Este es un proyecto PHP muy sencillo que muestra una lista de productos almacenados en MySQL y permite agregar nuevos mediante un formulario.

## Requisitos

- PHP con extensión PDO para MySQL
- Servidor MySQL

## Instalación

1. Crea una base de datos llamada `mi_bd` (o modifica la cadena de conexión en `index.php`).
2. Ejecuta el script `schema.sql` para crear la tabla `productos`:

   ```sql
   CREATE TABLE productos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(255) NOT NULL,
       precio DECIMAL(10,2) NOT NULL
   );
   ```
3. Ajusta si es necesario el usuario y contraseña de la base de datos en `index.php`.
4. Coloca los archivos del proyecto en el directorio de tu servidor web y accede a `index.php`.

Al cargar la página verás la lista de productos registrados y un formulario para dar de alta un nuevo producto.
