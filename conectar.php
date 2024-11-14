<?php
session_start();									// PHP llamará a los gestores de almacenamiento de sesiones open y read

													// Conecta con el SERVIDOR WEB LOCAL: localhost - super_user: root - pass: (sin password)
													// Luego con la base de datos en MYSQL formulario, sino muestra el Error de conexión.
$conn = mysqli_connect('localhost', 'root', '', 'inventario') or die (mysqli_error($mysqli));
?>
