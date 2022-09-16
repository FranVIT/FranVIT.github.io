<?php

session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';


if (!isset($_SESSION["id_usuario"])){
	header("Location: index.php");
}
$idUsuario = $_SESSION['id_usuario'];

$sql="SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Memoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/ad850d140d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type= "icon/png" href="img/luto.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <body class="bg-Light">
    <div class="container bg-dark text-light p-2 rounded my-4">
        <div class="d-flex align-items-center justify-content-between px-2">
        
            <h2>
                <a href="crud.php" class="text-white text-decoration-none"><i class="bi bi-stars"></i></i></class=>
                    CyD</a>
                <H3>En Memoria de Mario Alberto Martín Hernández</H3>
            </h2>
           
                
                
    

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                   
                    <li><a class="dropdown-item" href="seccion1.php">Historial</a></li>
                    <li><a class="dropdown-item" href="crud.php">Equipos</a></li>
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="logout.php">Cerrar Sessión</a></li>
                </ul>
            </div>


        </div>
    </div>

    <style type="text/css">

        * {
        margin: 0;
        padding: 0;
        font-family: poppins, sans-serif;
        }
        body {
        background-image: linear-gradient(135deg,
        #00B7D4, #505488, #2f3f80,#161569,#5a4894,#a950a1,#ff7cae);
        background-size: 500%;
        animation: fanimado 10% infinite;
        }

       img {
        width: 300px;
        height: 300px;
        margin-bottom: 40px;
        margin-inline: 16px;
        object-fit: fill;
       }
       h2 {
        color: white;
       }
       @keyframes fanimado{
        0%{
            background-position: 0% 50%;
        }
        50%{
            background-position: 100% 50%;
        }
        100%{
            background-position: 0% 50;
        }
       }
    </style>
    

</head>


<body>
<div class="text-center">
  <img src="img/enmemo/mario.jpg" class="rounded" alt="">
</div>
<div class="text-center">
<h2>Todo hombre muere, pero no todos los hombres realmente viven como tú lo hiciste.</h2>
<h2>Nunca te olvidaremos. Tus amigos de Comunicación y Difusion.</h2>
<h2>Descansa en Paz Mario</h2>
</div>
<br>
<div>
<img src="img/enmemo/MF.jpg" class="rounded" alt="...">
<img src="img/enmemo/MYP.jpg" class="rounded" alt="...">
<img src="img/enmemo/CYD1.jpg" class="rounded" alt="...">
<img src="img/enmemo/CYD2.jpg" class="rounded" alt="...">
<img src="img/enmemo/CYD3.jpg" class="rounded" alt="...">
<img src="img/enmemo/CYD4.jpg" class="rounded" alt="...">


<img src="img/enmemo/DRAGBALL.jpg" class="rounded" alt="...">
<img src="img/enmemo/music.jpg" class="rounded" alt="...">
<img src="img/enmemo/chuck.jpg" class="rounded" alt="...">
<img src="img/enmemo/cine.jpg" class="rounded" alt="...">
</div>
  

</body>
</html>