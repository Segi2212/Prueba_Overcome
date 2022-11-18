<?php
include('API.php');
session_start();



if (empty($_SESSION['usuario'])) {
    echo "<script>location.href = 'index.php';</script>";
}

function cambio()
{
    $APIConn = new apiPruebaOvercome;
    $n = $APIConn->comprobarLista();
    echo "$n";
}

function crearArreglo()
{
    $APIConn = new apiPruebaOvercome;
    $arreglo = $APIConn->tickets();
    echo "$arreglo";
}

function logear(String $a)
{
    //echo "console.log(" . $a . ")";
    $_SESSION['id']  = $a;
    echo "location.href = 'Modificar.php';";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3f5aeb3ac6.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
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
            <li><a href="">Reportes</a></li>
            <li><a href="Nuevo.php">Nuevo reporte</a></li>
            <li><a href="Archivados.php">Archivados</a></li>

        </ul>
    </nav>

    <div class="dash_cont">

        <div class="nuevo">
            <p class="card_text">Nuevos</p>
            <div id="cont_cartas">
            </div>
        </div>

        <div class="proceso">
            <p class="card_text">En proceso</p>
            <div id="cont_cartas2">
            </div>
        </div>

        <div class="atendido">
            <p class="card_text">Atendidos</p>
            <div id="cont_cartas3">
            </div>
        </div>
    </div>

    <!--<portal id="exampleportal" src="https://facebook.com/"></portal>

    

    <section id="reportes">
        <div >

        </div>
        <p class="cabecera">Listado de reportes</p>
        <div class="barra">
            <div class="rep_box">
                <p class="rep_title">ID</p>
            </div>
            <div class="rep_box">
                <p class="rep_title">Título</p>
            </div>
            <div class="rep_box">
                <p class="rep_title">Incidencia</p>
            </div>
            <div class="rep_box">
                <p class="rep_title">Gravedad</p>
            </div>
        </div>
        <div class="rep_lista" id="rep_lista">
        </div>
    </section>

    <section id="nuevo">
        <form class="reporte_nuevo" action="get">
            <input type="text" name="titulo" placeholder="Titulo">
            <input type="text" name="departamento" placeholder="Departamento encargado">
            <div>
                <p>Incidencia:</p>
                <input type="radio" id="html" name="fav_language" value="HTML">
                <label for="html">Feature</label>
                <input type="radio" id="css" name="fav_language" value="CSS">
                <label for="css">Bug</label><br>
            </div>
            <div>
                <p>Incidencia:</p>
                <input type="radio" id="html" name="fav_language" value="HTML">
                <label for="html">Feature</label>
                <input type="radio" id="css" name="fav_language" value="CSS">
                <label for="css">Bug</label><br>
                <input type="radio" id="css" name="fav_language" value="CSS">
                <label for="css">Bug</label><br>
            </div>
            <input type="text" name="departamento" placeholder="Version del software">
            <textarea name="" id="" cols="30" rows="10" placeholder="Descripción"></textarea>
            <input type="file" name="" id="">
            <input type="submit" value="">

        </form>
    </section>-->

</body>

</html>

<script>
    /*var n = 0;*/
    var array = <?php echo crearArreglo(); ?>

    listar()

    /*setInterval(function() {
        var n1 = "<?php echo cambio(); ?>"
        console.log(n)
        console.log(n1)
        if (n == 0) {
            n = n1
        } else if (n > 0 && n != n1) {
            listar(n);
            n = n1
        }
    }, 50000)*/

    function listar() {
        for (let i = 0; i < array.length; i++) {

            var cartaNueva = document.createElement("div");
            cartaNueva.id = "cartas_nuevo" + i;
            cartaNueva.className = "cartas_nuevo" //Esta es una carta nueva (necesita ID unico)

            var cartaProceso = document.createElement("div");
            cartaProceso.id = "cartas_proceso" + i;
            cartaProceso.className = "cartas_proceso" //Esta es una carta en proceso (necesita ID unico)

            var cartaAtendido = document.createElement("div");
            cartaAtendido.id = "cartas_atendido" + i;
            cartaAtendido.className = "cartas_atendido" //Esta es una carta en proceso (necesita ID unico)

            var contTop = document.createElement("div");
            contTop.className = "top" //Aquí se va a contener los textos de top

            var id = document.createElement("div");
            id.className = "carta_id" //Aquí se va a contener el id

            var titulo = document.createElement("div");
            titulo.className = "carta_titulo" //Aquí se va a contener el titulo

            var contBot = document.createElement("div");
            contBot.className = "bot" //Aquí se va a contener los textos de bot

            var insi = document.createElement("div");
            insi.className = "carta_insi" //Aquí se va a contener la incidencia

            var gravedad = document.createElement("div");
            gravedad.className = "carta_gravedad" //Aquí se va a contener la gravedad






            contTop.appendChild(id)
            contTop.appendChild(titulo)

            contBot.appendChild(insi)
            contBot.appendChild(gravedad)

            id.textContent = "ID: " + array[i]["id"]
            titulo.textContent = "Titulo: " + array[i]["titulo"]
            insi.textContent = "Incidencia: " + array[i]["incidencia"]
            gravedad.textContent = "Gravedad: " + array[i]["gravedad"]


            if (array[i]["etapa"] == "Nuevo") {
                var carta = document.getElementById("cont_cartas"); //este es el contenedor padre
                carta.appendChild(cartaNueva)
                cartaNueva.appendChild(contTop)
                cartaNueva.appendChild(contBot)
                cartaNueva.addEventListener('click', function() {
                    abrir(array[i]["id"])
                })
            } else if (array[i]["etapa"] == "Proceso") {
                var carta2 = document.getElementById("cont_cartas2"); //este es el contenedor padre
                carta2.appendChild(cartaProceso)
                cartaProceso.appendChild(contTop)
                cartaProceso.appendChild(contBot)
                cartaProceso.addEventListener('click', function() {
                    abrir(array[i]["id"])
                })
            } else if (array[i]["etapa"] == "Atendido") {
                var carta3 = document.getElementById("cont_cartas3"); //este es el contenedor padre
                carta3.appendChild(cartaAtendido)
                cartaAtendido.appendChild(contTop)
                cartaAtendido.appendChild(contBot)
                cartaAtendido.addEventListener('click', function() {
                    abrir(array[i]["id"])
                })
            }





        }
    }

    function abrir(id) {

        localStorage.setItem("id", id);
        location.href = "Modificar.php";
    }
</script>