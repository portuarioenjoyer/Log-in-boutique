<?php
 session_start();
 if(!empty($_POST["boton"])){
    if(!empty($_POST["user"]) and !empty($_POST["password"])) {
        $user= $_POST["user"];
        $password= $_POST["password"];
       $sql= $connection-> query(" select * from usuarios where nombre_usuario='$user' and contrasena='$password' ");
       if ($datos=$sql->fetch_object()) {
        $_SESSION["id"]=$datos->id;
        $_SESSION["nombre"]=$datos->nombre_usuario;
        $_SESSION["contrasena"]=$datos->contrasena;
        $_SESSION["name"]=$datos->nombre;
        $_SESSION["surname"]=$datos->apellido;
        $_SESSION["rol"]=$datos->id_rol;

        header("location: home.php");
       } else {
        echo "<div class='error'>Credenciales Incorrectas </div>";
       }
       
        
} else{
    echo "<div class='error'>Campos Vacios </div>";
}
}

?>