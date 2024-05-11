<?php
session_start();
if(empty($_SESSION["id"])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión</title>
    <link href="Proveedores/styles.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

  <div style="display: flex; align-items: center;">
    <img src="img/proveedorimg.png" width= 80px alt="" style="margin-right: 20px;">
    <h2>Proveedores</h2>
  </div>
  <br> 
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre/Empresa</th>
                <th>Contacto</th>
                <th>Productos Ofrecidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
           $scon = mysqli_connect('localhost', 'root', '', 'notanbd');

           if (!$scon) {
               die("Connection failed: " . mysqli_connect_error());
           }

           $sql = "SELECT id, `Nombre.Empresa`, Contacto, Productosofrecidos FROM proveedores";
           $result = mysqli_query($scon, $sql);

           if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>" . $row["id"] . "</td>";
                   echo "<td>" . $row["Nombre.Empresa"] . "</td>";
                   echo "<td>" . $row["Contacto"] . "</td>";
                   echo "<td>"; // Comienzo de la celda de productos ofrecidos
                   // Divide la cadena de productos en un array usando el salto de línea como separador
                   $productosOfrecidos = explode("\n", $row["Productosofrecidos"]);
                   foreach ($productosOfrecidos as $producto) {
                       echo $producto . "<br>";
                   }
                   echo "</td>"; // Fin de la celda de productos ofrecidos
                   echo '<td><button class="btn btn-sm btn-edit">Editar</button>';
                   echo '<button class="btn btn-sm btn-delete">Eliminar</button>';
                   echo '</td>';
                   echo "</tr>";
               }
           } else {
               echo "<tr><td colspan='4'>No hay Proveedores disponibles.</td></tr>";
           }

           mysqli_close($scon);
        ?>
        </tbody>
    </table>

    <!-- Botón para agregar nuevo proveedor -->
    <button onclick="cargarNuevoProveedor()" class="btn btn-success">Agregar otro Proveedor</button>
</div>

<script>
    function cargarNuevoProveedor() {
        $.get("Proveedores/proveedoresformulario.html", function (data) {
            $("#workspace").html(data);
        });
    }
</script>

</body>
</html>


