<?php

include('API.php');
session_start();
if (empty($_SESSION['usuario'])) {
    echo "<script>location.href = 'index.php';</script>";
}

function crearArreglo()
{
    $APIConn = new apiPruebaOvercome;
    $arreglo = $APIConn->archivados();
    echo "$arreglo";
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
            <li><a href="Nuevo.php">Nuevo reporte</a></li>
            <li><a href="Archivados.php">Archivados</a></li>

        </ul>
    </nav>

    <div class="listaArchivados">
        <div class="listado_arc">
            <div>ID</div>
            <div>Titulo</div>
            <div>Descripcion</div>


        </div>
        <div class="archivados" id="archivados">
        </div>
    </div>
</body>

</html>

<script>
    var array = <?php echo crearArreglo(); ?>

    listar();

    function listar() {
        for (let i = 0; i < array.length; i++) {

            var id = document.createElement("div");
            var titulo = document.createElement("div");
            var descrip = document.createElement("div");

            var divG = document.getElementById("archivados")
            divG.appendChild(id)
            divG.appendChild(titulo)
            divG.appendChild(descrip)

            id.textContent = array[i]["id"]
            titulo.textContent = array[i]["titulo"]
            descrip.textContent = array[i]["descripcion"]
        }

    }
</script>