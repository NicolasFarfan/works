<?php include("conectar.php"); ?>

<!doctype html>
<html lang="en">
    <head>
        <title>Productos</title>
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


<body style="	padding: 0; margin: 0; text-align: center; background-color: #8bdfec ">

<!-- Formulario para EDITAR un registro !-->
<div style=" background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 20px auto;">
  <center> <h2>Producto a cambiar</h2> </center>
  <form action="editar.php">
    <label for="Id">ID:</label>
    <input type="number" name="Id" min="1" required> 
    <input type="submit" value="Editar">
    <a href="index.php"><button type="button" >Inicio</button></a>
  </form>
</div>
<!-- Marco de la tabla de los Productos -->
<table style="border-collapse: collapse;text-align: center; background-color: beige; color: #24303c; width: calc(75% - 50px); margin: auto; margin-top: 12px; font-size: 16px;">
    <thead style="border-bottom: #24303c; color: #ededed; background-color:	#ff5f34 ;">
      <tr style="text-align:center">
        <th> ID </th>	
        <th> Nombre </th>
        <th> Cantidad </th>
        <th> Precio </th>
        <th> Sección </th>
      </tr>
    </thead>
  <tbody>

<!-- Registros de los Productos -->
<?php
  $query = "SELECT * FROM productos ORDER BY seccion ASC";						
  $result_tasks = mysqli_query($conn, $query);			
  while($row = mysqli_fetch_assoc($result_tasks)) { ?>
    <tr>													
      <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Cantidad']; ?></td>
      <td><?php echo $row['Precio']; ?></td>
      <td><?php echo $row['Seccion']?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

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
