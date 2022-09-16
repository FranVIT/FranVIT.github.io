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
<div id="principal">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/ad850d140d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type= "icon/png" href="img/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   
    

</head>

<body class="bg-Light">
    <div class="container bg-dark text-light p-2 rounded my-4">
        <div class="d-flex align-items-center justify-content-between px-2">
        
            <h2>
                <a href="crud.php" class="text-white text-decoration-none"><i class="bi bi-camera-fill"></i></class=>
                    COMUNICACIÓN Y DIFUSIÓN</a>
                <H3>EQUIPOS</H3>
            </h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEquipos">
                <i class="bi bi-plus-circle-dotted"></i>
                Agregar Equipo</button>
                
                
    

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                   
                    <li><a class="dropdown-item" href="seccion1.php">Historial</a></li>
                    <li><a class="dropdown-item" href="enMemoria.php">En memoria</a></li>
                   <!-- <li><a class="dropdown-item" href="registro.php">Agregar Nuevo personal</a></li>-->
                    <li><hr class="dropdown-divider"></li> 
                    <li><a class="dropdown-item" href="logout.php">Cerrar Sessión</a></li>
                </ul>
            </div>


        </div>
    </div>


    <?php
if(isset($_GET['alert']))
{
if($_GET['alert']=='img_upload')
{
	echo<<<alert
	<div class="container alert alert-danger alert-dismissible text-center" role="alert">
	<strong>LA CARGA DE LA IMAGEN FALLÓ!! >:(</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['alert']=='img_rem_fail')
{
	echo<<<alert
	<div class="container alert alert-danger alert-dismissible text-center" role="alert">
	<strong> SE ACABA DE ELIMINAR LOS RESTOS DE LA IMAGEN</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['alert']=='add_failed')
{
	echo<<<alert
	<div class="container alert alert-danger alert-dismissible text-center" role="alert">
	<strong> NO SE PUDO AGREGAR LOS DATOS DEL EQUIPO!! >:(</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['alert']=='remove_failed')
{
	echo<<<alert
	<div class="container alert alert-danger alert-dismissible text-center" role="alert">
	<strong> NO SE PUDO ELIMINAR EL EQUIPO!!</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['alert']=='update_failed')
{
	echo<<<alert
	<div class="container alert alert-danger alert-dismissible text-center" role="alert">
	<strong> NO SE PUDO EDITAR EL EQUIPO!!</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
}
else if(isset($_GET['success']))
{
if($_GET['success']=='added')
{
	echo<<<alert
	<div class="container alert alert-success alert-dismissible text-center" role="alert">
	<strong>SE HA AGREGADO EL EQUIPO CON EXITO JEFE :D</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['success']=='removed')
{
	echo<<<alert
	<div class="container alert alert-success alert-dismissible text-center" role="alert">
	<strong>EL EQUIPO HA SIDO ELIMINADO</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
if($_GET['success']=='updated')
{
	echo<<<alert
	<div class="container alert alert-success alert-dismissible text-center" role="alert">
	<strong>EL EQUIPO HA SIDO ACTUALIZADO</strong> 
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
alert;

}
}
?>

    <div class="container mt-4 p-0">
        <table class="table table-hover text-center">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col" class="rounded-start">id</th>
                    <th scope="col">Articulo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Accesorios</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th width="10%" scope="col">Fecha</th>
                    <th scope="col">Imagen</th>
                    <th width="10%" scope="col" class="rounded-end">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">

                <?php

$query="SELECT * FROM `inventario_equipos`";

$result=mysqli_query($mysqli,$query);
$i=1;
$fetch_src=FETCH_SRC;
while($fetch=mysqli_fetch_assoc($result))
{
echo<<<inventario_equipos
<tr class="align-middle">
  <th class="table-dark" scope="row">$i</th>
  <td class="table-dark">$fetch[Articulo]</td>
  <td class="table-dark">$fetch[Marca]</td>
  <td class="table-dark">$fetch[Modelo]</td>
  <td class="table-dark">$fetch[Accesorios]</td>
  <td class="table-dark">$fetch[Descripción]</td>
  <td class="table-dark">$fetch[Estado]</td>
  <td class="table-dark">$fetch[fecha_Obtencion]</td>
  <td class="table-dark"><img src="$fetch_src$fetch[image]" width="150px"></td>
  <td class="table-dark">
  <a href="?edit=$fetch[id_Equipos]" class="btn btn-info me-2"><i class="bi bi-pencil-square"></i></a>
  <button onclick="confirm_rem($fetch[id_Equipos])" class="btn btn-danger"><i class="bi bi-trash-fill">
  </i></button>
  
  </td>
</tr>
inventario_equipos;
$i++;

}

?>


            </tbody>
        </table>

    </div>


    <div class="modal fade" id="addEquipos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
        <div class="modal-dialog">
            <form action="crud_funcs.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Equipo</h5>



                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Articulo</span>
                            <input type="text" class="form-control" name="Articulo" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Marca</span>
                            <input type="text" class="form-control" name="Marca" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Modelo</span>
                            <input type="text" class="form-control" name="Modelo" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Accesorios</span>
                            <input type="text" class="form-control" name="Accesorios" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" name="Descripción" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Estado</span>
                            <input type="text" class="form-control" name="Estado" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fecha de Obtención</span>
                            <input type="date" class="form-control" name="fecha_Obtencion" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Imagen</label>
                            <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="addEquipos" >Agregar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>



    <div class="modal fade" id="editEquipos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="crud_funcs.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Equipo</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Articulo</span>
                            <input type="text" class="form-control" name="Articulo" id="editArt" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Marca</span>
                            <input type="text" class="form-control" name="Marca" id="editMar" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Modelo</span>
                            <input type="text" class="form-control" name="Modelo" id="editMod" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Accesorios</span>
                            <input type="text" class="form-control" name="Accesorios" id="editAcce" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Descripción</span>
                            <textarea class="form-control" name="Descripción" id="editDes" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Estado</span>
                            <input type="text" class="form-control" name="Estado" id="editEst" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fecha de Obtención</span>
                            <input type="date" class="form-control" name="fecha_Obtencion" id="editFech" required>
                        </div>
                        <img src="" id="editImg" width="100%" class="mb-3"><br>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Elige de nuevo la imagen</label>
                            <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
                        </div>
                        <input type="hidden" name="editAid" id="editAid">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="editEquipos">Editar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php
if(isset($_GET['edit']) && $_GET['edit']>0)
{
$query="SELECT * FROM `inventario_equipos` WHERE `id_Equipos`='$_GET[edit]'";
$result=mysqli_query($mysqli,$query);
$fetch=mysqli_fetch_assoc($result);
echo"
<script>
var editEquipos = new bootstrap.Modal(document.getElementById('editEquipos'), {
	keyboard: false
  });
  document.querySelector('#editArt').value=`$fetch[Articulo]`;
  document.querySelector('#editMar').value=`$fetch[Marca]`;
  document.querySelector('#editMod').value=`$fetch[Modelo]`;
  document.querySelector('#editAcce').value=`$fetch[Accesorios]`;
  document.querySelector('#editDes').value=`$fetch[Descripción]`;
  document.querySelector('#editEst').value=`$fetch[Estado]`;
  document.querySelector('#editFech').value=`$fetch[fecha_Obtencion]`;
  document.querySelector('#editImg').src=`$fetch_src$fetch[image]`;
  document.querySelector('#editAid').value=`$_GET[edit]`;
  editEquipos.show();
</script>";
 
}
?>


    <script>
    function confirm_rem(id_Equipos) {
        if (confirm("¿Está seguro de que desea eliminar este elemento?!")) {
            window.location.href = "crud_funcs.php?rem=" + id_Equipos;
        }
    }
    </script>
</body>
</div>
</html>