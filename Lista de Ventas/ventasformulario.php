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
    <title>Agregar Nueva Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        form button {
            padding: 10px 20px;
            background-color: #1bc253;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
        }

        #tituloform {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            /* Espaciado inferior para separar del formulario */
        }

        #tituloform img {
            margin-right: 20px;
        }
    </style>
</head>
<body>

    <div id="tituloform">
        <img src="img/nuevaventa.png" width= 80px alt="">
        <h2>Agregar Nueva Venta</h2>
    </div>
    <form id="formAgregarProveedor" action="Lista de Ventas\procesar_agregar_venta.php" method="post">
        <label for="fechav">Fecha:</label>
        <input type="date" name="fechav" id="fechav" required>

        <label for="turno">Turno:</label>
        <input type="text" name="turno" id="turno" required>

        <table class="table" id="productosTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr class="producto-row">
                    <td>
                        <select name="producto[]" class="form-select producto" required>
                            <!-- Aquí generas las opciones con PHP -->
                            <?php
                            // Código PHP para obtener la lista de productos
                            // Asegúrate de tener la conexión a la base de datos establecida
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "notanbd";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verifica la conexión a la base de datos
                            if ($conn->connect_error) {
                                die("Error en la conexión a la base de datos: " . $conn->connect_error);
                            }

                            $sql = "SELECT Marca, Tipo, Modelo, Precio FROM prendas";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["Modelo"] . '" data-precio="' . $row["Precio"] . '">' . $row["Marca"] . ' - ' . $row["Tipo"] . ' - ' . $row["Modelo"] . '</option>';
                                }
                            } else {
                                echo '<option value="">No hay productos disponibles</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="cantidad[]" class="cantidad" min="1" required></td>
                    <td><input type="text" name="precio[]" class="precio" readonly></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="agregarFila">Agregar Producto</button>

        <label for="metodopago">Método de Pago:</label>
        <input type="text" name="metodopago" id="metodopago" required>

        <label for="total">Total:</label>
        <input type="text" name="total" id="total" readonly required>

        <button type="submit">Agregar Venta</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Manejar el cambio en el producto
            $("#productosTable").on("change", ".producto", function () {
                // Obtener el precio del producto seleccionado
                var precio = parseFloat($(this).find(":selected").data("precio"));
                // Establecer el precio en el campo correspondiente
                $(this).closest("tr").find(".precio").val(precio.toFixed(2));
                // Actualizar el total
                actualizarTotal();
            });

            // Manejar el cambio en la cantidad
            $("#productosTable").on("input", ".cantidad", function () {
                // Establecer la cantidad predeterminada en 1 si está vacía
                if ($(this).val() === "") {
                    $(this).val("1");
                }
                // Actualizar el total
                actualizarTotal();
            });

            // Manejar el clic en el botón para agregar una nueva fila
            $("#agregarFila").click(function () {
                // Clonar la última fila y limpiar los valores
                var newRow = $("#productosTable tbody tr:last").clone();
                newRow.find(".producto").val(""); // Limpiar el valor del producto
                newRow.find(".cantidad").val(""); // Limpiar la cantidad
                newRow.find(".precio").val(""); // Limpiar el precio

                // Agregar la nueva fila al final de la tabla
                $("#productosTable tbody").append(newRow);
            });

            // Manejar el envío del formulario
   $("#formAgregarProveedor").submit(function (e) {
    // Validar solo si hay al menos un producto seleccionado en alguna fila
    var productosSeleccionados = $(".producto").filter(function () {
        return $(this).val() !== ""; // Filtrar solo los productos seleccionados
    });

    if (productosSeleccionados.length === 0) {
        alert("Debes seleccionar al menos un producto.");
        e.preventDefault(); // Evitar que el formulario se envíe
    }
});

            

            function actualizarTotal() {
                var total = 0;
                // Iterar sobre las filas de productos
                $(".producto-row").each(function () {
                    var cantidad = parseFloat($(this).find(".cantidad").val()) || 0;
                    var precio = parseFloat($(this).find(".precio").val()) || 0;
                    // Calcular el subtotal y sumarlo al total
                    total += cantidad * precio;
                });
                // Establecer el total en el campo correspondiente
                $("#total").val(total.toFixed(2));
            }
        });
    </script>
</body>
</html>
