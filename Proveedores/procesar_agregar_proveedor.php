<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notanbd";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$nombreEmpresa = $_POST["nombreEmpresa"];
$contacto = $_POST["contacto"];
$productosOfrecidos = $_POST["productosOfrecidos"];

$sql = "INSERT INTO proveedores (`Nombre.Empresa`, Contacto, Productosofrecidos) VALUES ('$nombreEmpresa', '$contacto', '$productosOfrecidos')";

if ($conn->query($sql) === TRUE) {
    header("Location: /proyecto_boutique/home.html?module=proveedores");
    exit(); 
} else {
    echo "Error en la inserción: " . $conn->error;
}

$conn->close();
?>