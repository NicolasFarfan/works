<?php 
include("conectar.php");                // Conecta con el servidor web local (Apache2 o NGiNX), MySQl y la base de datos

$Nombre = ''; 
$Cantidad= ''; 
$Precio= ''; 
$Seccion= ''; 

if (isset($_GET['Id'])) {              # Verificacion de parametro
    $Id = $_GET['Id']; 
    $query = "SELECT * FROM productos WHERE Id=$Id";    #Realiza una consulta de la base de datos
    $result = mysqli_query($conn, $query);              
    if (mysqli_num_rows($result) == 1) {                #verifica          
        $row = mysqli_fetch_array($result); 
        $Nombre =$row['Nombre']; 
        $Cantidad = $row['Cantidad']; 
        $Precio = $row['Precio']; 
        $Seccion = $row['Seccion']; 
    } 
} 
?> 

<!doctype html>
<html lang="en">
    <head>
        <title>Edición</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

<body style=" padding: 0; margin: 0; text-align: center; background-color: #8bdfec"> 
<br><br>
<div style="background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 40px auto;"> 
    <br> 
    <h3>Ingrese los nuevos valores</h3> 
    <form method="POST" action="editar.php?Id=<?php echo $_GET['Id']; ?>" > 
        <div style="padding: 2px; padding-left: 15px;"> 
            <label for="Nombre">Nombre: </label> 
            <input name="Nombre" type="text" required autocomplete="off" style="background-color: white;" value="<?php echo $Nombre; ?>"> 
        </div> 
        <div style="padding: 2px; padding-left: 3px"> 
            <label for="Cantidad">Cantidad: </label> 
            <input name="Cantidad" type="number" min="0" style="background-color: white;" value="<?php echo $Cantidad; ?>"> 
        </div> 
        <div style="padding: 2px; padding-left: 30px"> 
            <label for="Precio">Precio:</label> 
            <input name="Precio" type="number" min="0" style="background-color: white;" value="<?php echo $Precio; ?>"> 
        </div> 
        <div style="padding:2px;padding-left: 15px;">
          <label for="Seccion">Sección:</label>
          <select name="Seccion" id="Seccion">
            <option value=""></option>
              <?php 
              $query = "SELECT DISTINCT Seccion FROM productos";
              $result_tasks = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result_tasks)) { 
                  echo '<option value="' . $row['Seccion'] . '">' . $row['Seccion'] . '</option>';
              }?>
          </select>
          <input  value="<?php echo $Seccion; ?>" type="text" id="new_seccion" name="new_seccion" placeholder="Agregar nueva sección" autocomplete="off">
        </div>
        <div style="padding: 2px;">
        <a href="tabla.php"> <button type="button" style="background-color: skyblue;" >Volver</button></a> 
        <button name="UPDATE" style="background-color: skyblue;" >Modificar </button> 
        <button name="DELETE" style="background-color: red;" >Borrar </button> 
        </div>
    </form> 
<br>

</div> 
<?php 
if (isset($_POST['UPDATE'])) { 
    $Id = $_GET['Id']; 
    $Nombre= strtoupper ($_POST['Nombre']); 
    $Cantidad = $_POST['Cantidad']; 
    $Precio = $_POST['Precio']; 
    if(isset($_POST['Seccion']) && $_POST['Seccion'] == '') {                            # Verificacion si se selecciono una opcion
        $Seccion = strtoupper ($_POST['new_seccion']);                                                 # Sino crea una nueva seccion en otra lista
      } else {
        $Seccion = strtoupper ($_POST['Seccion']);
      }

    $query = "UPDATE productos set Nombre = '$Nombre', Seccion = '$Seccion', Cantidad = '$Cantidad' , Precio = '$Precio' WHERE Id='$Id'";
    mysqli_query($conn, $query);
    header("Location: tabla.php?mensaje=Producto editado correctamente");
    exit();
    }
if (isset($_POST['DELETE'])) { 
    $Id = $_GET['Id']; 
    $query = "DELETE FROM productos WHERE Id='$Id'"; 
    mysqli_query($conn, $query);
    header("Location: tabla.php?mensaje=Producto eliminado Correactamente");
    exit();
} 
?> 
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
