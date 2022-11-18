<?php
include('API.php');
error_reporting(0);
session_start();

if (empty($_SESSION['usuario'])) {
    echo "<script>location.href = 'index.php';</script>";
}

if (isset($_GET['submit'])) {

    $APIConn = new apiPruebaOvercome;

    $titulo = $_GET['titulo'];
    $fecha = date('y/m/d');
    $usuario = $_SESSION['usuario'];
    $arregla = $_GET['arregla'];
    $inci = $_GET['inci'];
    $gravedad = $_GET['gravedad'];
    $version = $_GET['version'];
    $descripcion = $_GET['descripcion'];
    $etapa = "Nuevo";
    $archivado = "0";

    $respuesta = $APIConn->nuevoTicket($titulo, $fecha, $usuario, $arregla, $inci, $gravedad, $version, $descripcion, $etapa, $archivado);
    if ($respuesta = true) {
        echo "<script>alert('.$respuesta.');</script>";
        echo "<script>location.href = 'Dashboard.php';</script>";
    }
    echo "<script>alert('Error al publicar');</script>";
    echo "<script>location.href = 'Nuevo.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3f5aeb3ac6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style1.css">
    <title>Nuevo ticket</title>
</head>

<body>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="cont_img">
            <a href=""><img src="Img/User.png" alt=""></a>
        </div>
        <ul>
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-xmark"></i>
            </label>
            <br><br><br>
            <li><a href="Dashboard.php">Reportes</a></li>
            <li><a>Nuevo reporte</a></li>
            <li><a href="Archivados.php">Archivados</a></li>

        </ul>
    </nav>

    <div class="nuevo_ticket">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
            <p class="ticket_cabecera">Nuevo ticket:</p>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" required>

            <label for="arregla">Debe Arreglar:</label>
            <input type="text" name="arregla" id="arregla" required>

            <br><br>
            <div class="doble">
                <label for="inci">Incidencia:</label>
                <select name="inci">
                    <option value="Bug" selected>Bug</option>
                    <option value="Feature">Featur</option>
                </select>
                <label for="gravedad">Gravedad:</label>
                <select name="gravedad">
                    <option value="Bajo" selected>Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Alto">Alto</option>
                </select>

                <br>
                <br>
                <label for="version">Version (del software):</label>
                <input type="text" name="version" id="version" style="width: 100px;" required onKeypress="if (event.keyCode < 0 || event.keyCode > 57) event.returnValue = false;">

            </div>

            <label for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" id="descripcion" rows="10" required></textarea>
            <br><br>
            <input type="submit" value="Publicar" name="submit">
        </form>
    </div>
</body>

</html>