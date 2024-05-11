<?php
session_start();
if(empty($_SESSION["id"])){
    header("location: index.php");
}
?>
<link href="Prendas/styles.css" rel="stylesheet">

<div>
 <div style="display: flex; align-items: center;">
    <img src="img/Iconoventas.png" width= 80px alt="" style="margin-right: 20px;">
    <h2>Lista de Ventas</h2>
 </div>
 <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Fecha</th>
                <th>Productos Vendidos</th>
                <th>Turno</th>
                <th>Método de Pago</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $scon = mysqli_connect('localhost', 'root', '', 'notanbd');

        if (!$scon) {
            die("Connection failed: " . mysqli_connect_error());
        }
  
        $sql = "SELECT Nro, Fecha, productosvendidos, Turno, Metodopago, Total FROM ventas";
  
        $result = mysqli_query($scon, $sql);
  
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              
                echo "<tr>";
                  echo "<td>" . $row["Nro"] . "</td>";
                  echo "<td>" . $row["Fecha"] . "</td>";
                  // Obtener productos vendidos
                   $productos_vendidos = $row["productosvendidos"];

                  // Dividir la cadena en líneas
                    $productos_array = explode("\n", $productos_vendidos);

                    // Mostrar productos uno debajo del otro
                  echo "<td>";
                  foreach ($productos_array as $producto) {
                  echo $producto . "<br>";
               }
                  echo "</td>";                  
                  echo "<td>" . $row["Turno"] . "</td>";
                  echo "<td>" . $row["Metodopago"] . "</td>";
                  echo "<td>" . $row["Total"] . "</td>";
                  echo '<td><button class="btn btn-sm btn-edit">Editar</button>
                  <button class="btn btn-sm btn-delete">Eliminar</button></td>';
                echo "</tr>";
           
            }
        } else {
            echo "<tr><td colspan='3'>No hay Ventas disponibles.</td></tr>";
        }
  
        mysqli_close($scon);
        ?>
           
        </tbody>
    </table>

    <!-- Botón para agregar nueva venta -->
    <button onclick="cargarNuevaVenta()" class="btn btn-success">Agregar Nueva Venta</button>
</div>
<script>
    function cargarNuevaVenta() {
        $.get("Lista de Ventas/ventasformulario.php", function (data) {
            $("#workspace").html(data);
        });
    }
</script>
