
<!doctype html>
<head>
  
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="estiloLogin.css">
</head>

<body>
    <div class="main">
        <div class="logo-container">
            <img src="img\iconolocal.png" alt="Logo">
        </div>
        <div class="login">
            <form id="loginForm" action="" method="post">
                <label style="text-align: center;">Iniciar Sesión </label>
                <div class="mensaje-container">
                <?php
                    include "connection.php"; 
                    include "controler.php"; 
                ?>
            </div>
                <input type="text" name="user" id="nombre_usuario" placeholder="Usuario" >
                <input type="password" name="password" id="contrasena" placeholder="Contrasena" >
                <input type="submit" class="btn" name="boton" value="iniciar sesion" id="botonS">
                <div text="align">
                </div>
            </form>
        </div>
    </div>
    
 </body>

