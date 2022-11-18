<?php
error_reporting(0);
include('API.php');

if (isset($_GET['submit'])) {

    $usuario = $_GET['usuario'];
    $contrasena = $_GET['contrasena'];
    $APIConn = new apiPruebaOvercome;

    if(empty($usuario) || empty($contrasena)){
        echo "<script>alert('Debe rellenar todos los campos');</script>";
        echo "<script>location.href = 'CrearCuenta.php';</script>";
    }
    else{
        $respuesta = $APIConn->crearUsuario($usuario,$contrasena);
        if($respuesta = true){
            echo "<script>alert('Cuenta creada con exito. Puede iniciar sesión');</script>";
            echo "<script>location.href = 'index.php';</script>";
        }
        echo "<script>alert('Hubo un problema, intente más tarde');</script>";
        echo "<script>location.href = 'CrearCuenta.php';</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

    <div class="cont">
        <form class="contenedor" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
            <p class="titulo">¡Hola!</p>
            <input class="caja" type="text" name="usuario" placeholder="Usuario" required>
            <input class="caja" type="password" name="contrasena" placeholder="Contraseña" required>
            <input class="boton" type="submit" name="submit" value="Crear cuenta">
            <p class="recuperar">¿Ya tienes una cuenta? <a href="index.php">Ingresar</a></p>
        </form>
    </div>

</body>

</html>