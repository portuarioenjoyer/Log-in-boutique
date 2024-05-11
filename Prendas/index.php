<?php
session_start();
if(empty($_SESSION["id"])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Prendas/styles.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div>
 <div style="display: flex; align-items: center;">
    <img src="img/prendas.png" width= 100px alt="" style="margin-right: 20px;">
    <h2>Listado de Prendas</h2>
 </div>

<br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Talle</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $scon = mysqli_connect('localhost', 'root', '', 'notanbd');

        if (!$scon) {
            die("Connection failed: " . mysqli_connect_error());
        }
  
        $sql = "SELECT id, Tipo, Modelo, Talle, Color, Marca, Stock, Precio FROM Prendas";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["Tipo"] . "</td>";
                  echo "<td>" . $row["Talle"] . "</td>";
                  echo "<td>" . $row["Color"] . "</td>";
                  echo "<td>" . $row["Marca"] . "</td>";
                  echo "<td>" . $row["Modelo"] . "</td>";
                  echo "<td>" . $row["Stock"] . "</td>";
                  echo "<td>" . $row["Precio"] . "</td>";
                  echo '<td><button class="btn btn-sm btn-edit">Editar</button>
                  <button class="btn btn-sm btn-delete">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='3'>No hay prendas disponibles.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nueva prenda -->
    <button onclick="cargarNuevaPrenda()" class="btn btn-success">Agregar Nueva Prenda</button>
</div>
<script>
    function cargarNuevaPrenda() {
        $.get("Prendas/prendasformulario.html", function (data) {
            $("#workspace").html(data);
        });
    }
</script>
</body>
</html>
