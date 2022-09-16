<?php

require 'funcs/conexion.php';

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc,$new_loc)){
        header("Location: crud.php?alert=img_upload");
        exit;
    }
    else {
        return $new_name;
    }
}

function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        header("Location: crud.php?alert=img_rem_fail");
        exit;
    } 
    else{
        echo"no se borro";
    }
}

if(isset($_POST['addEquipos']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($mysqli,$value);
    }
    $imgpath = image_upload($_FILES['image']);

    $query="INSERT INTO `inventario_equipos`(`Articulo`, `Marca`, `Modelo`, `Accesorios`, `Descripción`, `Estado`, `fecha_Obtencion`, `image`) VALUES 
    ('$_POST[Articulo] ','$_POST[Marca]','$_POST[Modelo]','$_POST[Accesorios]','$_POST[Descripción]','$_POST[Estado]','$_POST[fecha_Obtencion]','$imgpath')";
$ejecutando = mysqli_query($mysqli,$query);
if($ejecutando ==1 ){
    $query="INSERT INTO `equipos_agregados`(`Articulo`, `Marca`, `Modelo`, `Accesorios`, `Descripción`, `Estado`, `fecha_Obtencion`, `image`) VALUES 
    ('$_POST[Articulo] ','$_POST[Marca]','$_POST[Modelo]','$_POST[Accesorios]','$_POST[Descripción]','$_POST[Estado]','$_POST[fecha_Obtencion]','$imgpath')";

}
if(mysqli_query($mysqli,$query)){
    header("Location: crud.php?success=added");
}else{
    header("Location: crud.php?alert=add_failed");
}
};

if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `inventario_equipos` WHERE `id_Equipos` = '$_GET[rem]'";
    $result=mysqli_query($mysqli,$query);
    $fetch=mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query="DELETE FROM `inventario_equipos` WHERE `id_Equipos` ='$_GET[rem]'";
    if(mysqli_query($mysqli,$query)){
        header("Location: crud.php?success=removed");
    }
    else{
       header("Location: crud.php?alert=success=remove_failed");
        image_remove($fetch['image']);
    }

}

if(isset($_GET['rem2']) && $_GET['rem2']>0)
{
    $query="SELECT * FROM `equipos_agregados` WHERE `id_Equipos` = '$_GET[rem2]'";
    $result=mysqli_query($mysqli,$query);
    $fetch=mysqli_fetch_assoc($result);

    //image_remove($fetch['image']);

    $query="DELETE FROM `equipos_agregados` WHERE `id_Equipos` ='$_GET[rem2]'";
    if(mysqli_query($mysqli,$query)){
        image_remove($fetch['image']);
        header("Location: seccion1.php?success=removed");
        

    }
    else{
        
        header("Location: seccion1.php?alert=success=remove_failed");
       
    }
   

}



if(isset($_POST['editEquipos'])){
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($mysqli,$value);
    }
    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name']))
    {
    $query="SELECT * FROM `inventario_equipos` WHERE `id_Equipos` = '$_POST[editAid]'";
    $result=mysqli_query($mysqli,$query);
    $fetch=mysqli_fetch_assoc($result);
    

    //image_remove($fetch['image']);
    $imgpath = image_upload($_FILES['image']);

    $update="UPDATE `inventario_equipos` SET `Articulo`='$_POST[Articulo]',
    `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]',`image`= '$imgpath' WHERE `id_Equipos`='$_POST[editAid]'";
    
    
    //if(mysqli_query($mysqli,$update)){

    //$update="UPDATE `equipos_agregados` SET `Articulo`='$_POST[Articulo]',
    //`Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    //`Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]',`image`= '$imgpath' WHERE `id_Equipos`='$_POST[editAid]'";
    //}
    }
    else {
        $update="UPDATE `inventario_equipos` SET `Articulo`='$_POST[Articulo]',
        `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
        `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]' WHERE `id_Equipos`='$_POST[editAid]'";
    }
    if(mysqli_query($mysqli,$update)){


    $update="UPDATE `equipos_agregados` SET `Articulo`='$_POST[Articulo]',
        `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
        `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]' WHERE `id_Equipos`='$_POST[editAid]'";
    $update="UPDATE `inventario_equipos` SET `Articulo`='$_POST[Articulo]',
    `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]' WHERE `id_Equipos`='$_POST[editAid]'";
        header("Location: crud.php?success=updated");
    }
    else{
        header("Location: crud.php?alert=update_failed");
    } 

    if (mysqli_query($mysqli,$update)){
        
    $query="SELECT * FROM `equipos_agregados` WHERE `id_Equipos` = '$_POST[editAid]'";
    $result=mysqli_query($mysqli,$query);
    $fetch=mysqli_fetch_assoc($result);

    $update="UPDATE `equipos_agregados` SET `Articulo`='$_POST[Articulo]',
    `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]',`image`= '$imgpath' WHERE `id_Equipos`='$_POST[editAid]'";
    
    
       
    } else {
        
        $update="UPDATE `equipos_agregados` SET `Articulo`='$_POST[Articulo]',
    `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]', `image`= '$imgpath' WHERE `id_Equipos`='$_POST[editAid]'";
    }
    if (mysqli_query($mysqli,$update)){
    $query="SELECT * FROM `inventario_equipos` WHERE `id_Equipos` = '$_POST[editAid]'";
    $result=mysqli_query($mysqli,$query);
    $fetch=mysqli_fetch_assoc($result);
    $update="UPDATE `inventario_equipos` SET `Articulo`='$_POST[Articulo]',
    `Marca`='$_POST[Marca]',`Modelo`='$_POST[Modelo]',`Accesorios`='$_POST[Accesorios]',`Descripción`='$_POST[Descripción]',
    `Estado`='$_POST[Estado]',`fecha_Obtencion`='$_POST[fecha_Obtencion]',`image`= '$imgpath' WHERE `id_Equipos`='$_POST[editAid]'";
    }
}





?>

