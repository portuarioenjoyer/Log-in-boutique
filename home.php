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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px; 
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="#">
            <img src="img\iconolocal.png" style="border-radius: 9px;" alt="Logo" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--modulos del nav var-->

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="producto-link">Prendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="Ventas-link">Lista de Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="proveedores-link">Proveedores</a>
                </li>
                <?php if($_SESSION["rol"]==1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="informes/informes.php" id="informes-link">informes</a>
                </li>
                <?php } ?>
            </ul>

        
            <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <span class="nav-link">Bienvenido, <?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> (Rol: <?php  if($_SESSION["rol"]==1){
            echo "Administrador";
        } else{
            echo "Empleado";
        } ?>)</span>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="session_controler.php" id="cerrar-sesion-link">Cerrar Sesión</a>
    </li>
</ul>
        
        </div>
    </div>
</nav>

<!-- Área de trabajo central -->
<div class="container mt-4" id="workspace">
    <div class="text-center">
        <h2 align="center">Bienvenido al Sistema de Gestión "No Tan Santos"</h2>
        <img src="img\logolocalnegro.png" style="display: block; margin: auto; border-radius: 9px;" alt="Imagen de trabajo" class="img-fluid mt-3">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    //carga de modulos
    $(document).ready(function () {

        $("#producto-link").click(function () {
            $.get("Prendas/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#Ventas-link").click(function () {
            $.get("Lista de Ventas/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#proveedores-link").click(function () {
            $.get("Proveedores/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        // $("#informes-link").click(function () {
        //     $.get("informes/informes.php", function (data) {
        //         $("#workspace").html(data);
        //     });
        // });
    });

    $(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var module = urlParams.get('module');

    if (module === 'proveedores') {
        $.get("Proveedores/index.php", function (data) {
            $("#workspace").html(data);
        });
    }

    //redireccion si la url contiene "home.html?module=proveedores"
});

$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var module = urlParams.get('module');

    if (module === 'Listaventas') {
        $.get("Lista de Ventas/index.php", function (data) {
            $("#workspace").html(data);
        });
    }

    //redireccion si la url contiene "home.html?module=Listaventas"
});

$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var module = urlParams.get('module');

    if (module === 'prendas') {
        $.get("Prendas/index.php", function (data) {
            $("#workspace").html(data);
        });
    }

    //redireccion si la url contiene "home.html?module=prendas"
});

</script>
</body>
</html>

