<?php
include("conectar.php");												// Conecta con el servidor web local (Apache2 o NGiNX), MySQl y la base de datos

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM datos WHERE id = $id";							// Elimina el registro con SQL
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("No se pudo insertar datos (Query Failed!)");					// Muestra el mensaje después del alta de registro
  }

  $_SESSION['mensaje'] = 'Contacto eliminado';							// Muestra el mensaje despues de eliminar el registro
  $_SESSION['mensaje.C'] = 'danger';
  header('Location: index.php');										
}
?>