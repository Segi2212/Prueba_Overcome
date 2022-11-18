<?php
error_reporting(0);
include('API.php');

session_start();
$_SESSION['usuario'] = "";

if (isset($_GET['submit'])) {

    $usuario = $_GET['usuario'];
    $contrasena = $_GET['contrasena'];
    $APIConn = new apiPruebaOvercome;

    if(empty($usuario) || empty($contrasena)){
        echo "<script>alert('Debe rellenar todos los campos');</script>";
        echo "<script>location.href = 'CrearCuenta.php';</script>";
    }
    else{
        $respuesta = $APIConn->comprobarUsuario($usuario,$contrasena);
        if($respuesta > 0){
            $_SESSION['usuario']  = $usuario;
            echo "<script>location.href = 'Dashboard.php';</script>";
        }
        echo "<script>alert('Datos incorrectos');</script>";
        echo "<script>location.href = 'index.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Login</title>
</head>

<body>

    <div class="cont">
        <form class="contenedor" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
            <p class="titulo">Bienvenida/o</p>
            <input class="caja" type="name" name="usuario" placeholder="Nombre" required>
            <input class="caja" type="password" name="contrasena" placeholder="Contraseña" required>
            <input class="boton" type="submit" name="submit" value="Ingresar">
            <p class="recuperar">¿Aún no tienes una cuenta? <a href="CrearCuenta.php">Crea una</a></p>
        </form>
    </div>

</body>

</html>