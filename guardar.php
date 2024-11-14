<?php
include('conectar.php');	

if (isset($_POST['guardar'])) {		                                                         # Verificacion si se repite el dato de Nombre(para no repetir producto)
  $Nombre = strtoupper ($_POST['Nombre']);                                                 # srtoupper para ingresar el dato en MAYUSCULAS
  $query_existente = "SELECT * FROM productos WHERE Nombre = '$Nombre'";
  $result_existente = mysqli_query($conn, $query_existente);
  if (mysqli_num_rows($result_existente) > 0) {                                            # Verificacion de el ingreso de datos para guardar
    echo "<br><center><h1 style='color: red;'>El Producto ya Existe</h2></center>";}
    else{                                                                               
      $Cantidad = $_POST['Cantidad'];
      $Precio = $_POST['Precio'];
      if(isset($_POST['Seccion']) && $_POST['Seccion'] == '') {                            # Verificacion si se selecciono una opcion
        $Seccion = strtoupper ($_POST['new_seccion']);                                                 # Sino crea una nueva seccion en otra lista
      } else {
        $Seccion = strtoupper ($_POST['Seccion']);
      }
      $query = "INSERT INTO productos( Nombre, Cantidad, Precio, Seccion) VALUES ('$Nombre', '$Cantidad', '$Precio', '$Seccion')";	// Alta de datos con SQL
      $result = mysqli_query($conn, $query);
      echo "<br><center><h1>El Producto se Agrego Correctamente</h2 ></center>";
    }									
}


?>
<!doctype html>
<html lang="en">
    <head>
        <title>Destino Exitoso</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
    </head>

<body style=" padding: 0; margin: 0; text-align: center; background-color: #8bdfec">
<br>
<!-- Votones para volver a agregar.php y ir a tabla.php-->
<link>
  <a href="agregar.php">
    <center>
      <button>Volver</button>
    </center>
  </a>
    <br>
  <a href="tabla.php">
    <center>
      <button>Ver Productos</button>
    </center>
  </a>
  
   <!-- Bootstrap JavaScript Libraries -->
   <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    </body>
</html>
