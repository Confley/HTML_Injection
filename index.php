<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$contraseña = "";

// Realizar la conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contraseña) or die("Problemas al realizar la conexión");
mysqli_select_db($conexion, 'injection_bd') or die('Problemas al acceder a la tabla');

// Obtener todos los registros de la tabla "comentarios"
$consulta_registros = "SELECT * FROM comentarios";
$resultado = mysqli_query($conexion, $consulta_registros);

// Almacenar los registros en un array
$registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Práctica - HTML Injection</title>
  <!-- Agregar enlaces a los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <form action="registrar.php" method="post">
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" id="usuario" name="Usuario" required>
      </div>
      <div class="form-group">
        <label for="comentario">Comentario:</label>
        <input type="text" class="form-control" id="comentario" name="Comentario" required>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
      <br><br>
    </form>

    <?php
    // Mostrar el mensaje si está presente en las variables de sesión
    if (isset($_SESSION['mensaje'])) {
      echo "<div class='alert alert-primary' role='alert'>  {$_SESSION['mensaje']} </div>";
      // Limpiar el mensaje de la sesión
      unset($_SESSION['mensaje']);
    }
    ?>


    <h2>Registros existentes:</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Comentario</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registros as $registro): ?>
          <tr>
            <td>
              <?php echo $registro['Usuario']; ?>
            </td>
            <td>
              <?php echo $registro['Comentario']; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>