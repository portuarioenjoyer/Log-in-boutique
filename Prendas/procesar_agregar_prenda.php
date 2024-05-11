<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notanbd";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario 
$tipo = $_POST["tipo"];
$modelo = $_POST["modelo"];
$talle = $_POST["talle"];
$color = $_POST["color"];
$marca = $_POST["marca"];
$stock = $_POST["stock"];
$precio = $_POST["precio"];

$sql = "INSERT INTO prendas (Tipo, Talle, Color, Marca, Modelo, Stock, Precio) VALUES ('$tipo', '$talle', '$color', '$marca', '$modelo', '$stock', '$precio')";

if ($conn->query($sql) === TRUE) {
    header("Location: /proyecto_boutique/home.html?module=prendas");
    exit();
} else {
    echo "Error en la inserción: " . $conn->error;
}

$conn->close();
?>