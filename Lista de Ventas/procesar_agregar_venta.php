<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notanbd";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario (Completa con los nombres de campo correctos)
$fechav = $_POST["fechav"];
$turno = $_POST["turno"];
$productos = $_POST['producto'];
$metodopago = $_POST["metodopago"];
$total = $_POST["total"];

$productos_texto = implode("\n", $productos);


$sql = "INSERT INTO ventas (Fecha, Turno, productosvendidos, Metodopago, Total) VALUES ('$fechav', '$turno', '$productos_texto', '$metodopago', '$total')";

if ($conn->query($sql) === TRUE) {
    header("Location: /proyecto_boutique/home.html?module=Listaventas");
    exit(); 
} else {
    echo "Error en la inserción: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>