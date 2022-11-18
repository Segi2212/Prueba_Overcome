<?php

class apiPruebaOvercome{

    function crearUsuario(string $usuario, string $contrasena){
        include ('Conexion.php');
        $proc = mysqli_query($conn,"INSERT INTO usuarios VALUES ('','$usuario', '$contrasena')");
        if($proc){
            return true;
        }else{
            return false/*.$conn->error*/;
        }
        mysqli_close($conn);
    }

    function comprobarUsuario(string $usuario, string $contrasena){
        include ('Conexion.php');
        $proc = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
        $filas = mysqli_num_rows($proc);
        if($filas){
            return true;
        }else{
            return false;
        }
        mysqli_close($conn);
    }

}

?>