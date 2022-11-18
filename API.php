<?php

class apiPruebaOvercome
{

    function crearUsuario(string $usuario, string $contrasena)
    {
        include('Conexion.php');
        $proc = mysqli_query($conn, "INSERT INTO usuarios VALUES ('','$usuario', '$contrasena')");
        if ($proc) {
            return true;
        } else {
            return false/*.$conn->error*/;
        }
        mysqli_close($conn);
    }

    function comprobarUsuario(string $usuario, string $contrasena)
    {
        include('Conexion.php');
        $proc = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
        $filas = mysqli_num_rows($proc);
        if ($filas) {
            return true;
        } else {
            return false;
        }
        mysqli_close($conn);
    }

    function comprobarLista()
    {
        include('Conexion.php');
        $proc = mysqli_query($conn, "SELECT * FROM tickets");
        $filas = mysqli_num_rows($proc);
        return $filas;
        mysqli_close($conn);
    }

    function tickets()
    {
        include('Conexion.php');
        $conn = new mysqli($HOST, $USUARIO, $CONTRASENA, $BASE);
        $proc = mysqli_query($conn, "SELECT * FROM tickets");

        $json = array();

        while ($row = mysqli_fetch_array($proc)) {
            $id = $row['id'];
            $titulo = $row['titulo'];
            $incidencia = $row['incidencia'];
            $gravedad = $row['gravedad'];
            $etapa = $row['etapa'];
            $json[] = array('id' => $id, 'titulo' => $titulo, 'incidencia' => $incidencia, 'gravedad' => $gravedad, 'etapa' => $etapa);
        }

        mysqli_close($conn);
        return json_encode($json);
    }

    function nuevoTicket(String $titulo, String $fecha, String $usuario, String $arregla, String $inci, String $gravedad, String $version, String $descripcion, String $etapa, String $archivado)
    {
        include('Conexion.php');
        $proc = mysqli_query($conn, "INSERT INTO `tickets` (`id`, `titulo`, `fecha`, `usuario`, `departamento`, `incidencia`, `gravedad`, `version`, `descripcion`, `archivo`, `etapa`, `archivado`) VALUES (NULL, '$titulo', '$fecha', '$usuario', '$arregla', '$inci', '$gravedad', '$version', '$descripcion', '', '$etapa', '$archivado');");
        if ($proc) {
            return true;
        } else {
            return false.$conn->error;
        }
        mysqli_close($conn);
    }
    function modificar()
    {
    }
}
