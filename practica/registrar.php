<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$contraseña = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Realizar la conexión a la base de datos
  $conexion = mysqli_connect($servidor, $usuario, $contraseña) or die("Problemas al realizar la conexión");
  mysqli_select_db($conexion, 'injection_bd') or die('Problemas al acceder a la tabla');

  // Obtener los datos del formulario
  $usuario = $_POST['Usuario'];
  $comentario = $_POST['Comentario'];
  // $comentario = htmlspecialchars($_POST['Comentario'], ENT_QUOTES, 'UTF-8');
  // $comentario = mysqli_real_escape_string($conexion, $_POST['Comentario']);


  // Preparar la consulta parametrizada
  $consulta_registrar = "INSERT INTO comentarios(Usuario, Comentario) VALUES ('$usuario', '$comentario')";

  // Ejecutar la consulta
  if (mysqli_query($conexion, $consulta_registrar)) {
    $registroExitoso = true;
  } else {
    $registroExitoso = false;
  }

  // Verificar si el registro fue agregado correctamente
  if ($registroExitoso) {
    $_SESSION['mensaje'] = "El registro se agregó correctamente";
  } else {
    $_SESSION['mensaje'] = "Error al insertar el registro: " . mysqli_error($conexion);
  }

  // Cerrar la conexión
  mysqli_close($conexion);

  // Redirigir al usuario de regreso a la misma página
  header("Location: index.php");
  exit;
}
?>
