<?php
include('API.php');
session_start();

if (empty($_SESSION['usuario'])) {
    echo "<script>location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3f5aeb3ac6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style1.css">
    <title>Modificar</title>
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
            <li><a href="">Archivados</a></li>

        </ul>
    </nav>

</body>

</html>

<script>
    let id = localStorage.getItem("id");
    console.log(id);
</script>