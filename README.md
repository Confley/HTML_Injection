# HTML Injection

Proyecto de prueba para demostrar las vulnerabilidades de HTML Injection - Para la clase :3 

## Estructura de la base de datos

- Base de datos: injection_bd
- Tabla: comentarios
  - ID (11)
  - Usuario (20)
  - Comentario (255)

## Pasos a seguir

1. Descarga la rama (.zip) del proyecto.

2. Coloca la carpeta `practica` dentro de tu servidor local. Por ejemplo, en MI CASO la ruta sería: `C:\xampp\htdocs\injection`.

3. Crea una nueva base de datos llamada `injection_bd`.

4. Importa el archivo `comentarios.sql` en la base de datos que acabas de crear.

5. Accede al archivo `index.php` en tu servidor local. Por ejemplo, en MI CASO sería: `http://localhost/injection/practica/index.php`.

6. ¡Ya puedes comenzar con la práctica y explorar las vulnerabilidades de HTML Injection!

## Etiquetas de prueba

`<input class="form-control" placeholder="Filtrar" style="position: absolute; top: 275px; right: 120px; width: 300px"/>`

`<button class="btn btn-danger" onclick="window.location.href=`(dirección_malvada)`;" style="position: absolute; top: 275px; right: 45px"> Filtrar </button>`
