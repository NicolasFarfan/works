<?php include("conectar.php"); ?>         <!--Conecta con el servidor web local (Apache2 o NGiNX), MySQl y la base de datos!-->

<!doctype html>
<html lang="en">
    <head>
        <title>Agrregar Producto</title>
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

<body style="padding: 0; margin: 0; text-align: center; background-color: #8bdfec">
<br>
    <div style=" background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 40px auto;">
    <h2 >Ingrese los Datos del Producto a Agregar</h2>
      <form action="guardar.php" method="POST">	
        <div style="padding:2px; padding-left: 15px;">
          <label for="Nombre">Nombre:</label>
          <input type="text" name="Nombre"  style="background-color: white; " required  autocomplete="off">
        </div>

        <div style="padding:2px;padding-left: 10px;"> 
          <label for="Cantidad">Cantidad: </label>
          <input type="number" name="Cantidad" min="0" style="background-color: white;">
        </div>

        <div style="padding:2px;padding-left: 30px;">
          <label for="Precio">Precio: </label>
          <input type="number" name="Precio" min="0" style="background-color: white;"> 
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
          <input type="text" id="new_seccion" name="new_seccion" placeholder="Agregar nueva sección" autocomplete="off">
        </div>
        <div>
          <a href="index.php"><button type="button" >Inicio</button></a>
          <input type="submit" name="guardar" value="Agregar">
          </div>
      </form>
      <br>
      </div>
        
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