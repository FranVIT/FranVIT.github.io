<?php
	//conexion con la base de datos CyD 
	//infitnity free
	//Username	epiz_32602765
//Password 6bEzeJyy9sBH
//$mysqli=new mysqli("sql205.epizy.com","epiz_32602765","6bEzeJyy9sBH","epiz_32602765_Comunicacion_y_Difusion");
	$mysqli=new mysqli("localhost","id19576503_franciscoventura",")N/+s7Ik4Gihu$1*","id19576503_comunicacion_y_difusion"); 
	//)N/+s7Ik4Gihu$1* --contraseña de 000webhost
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
	define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/Aplicacion Web de los Equipos CyD/uploads/");
	define("FETCH_SRC","http://127.0.0.1/Aplicacion Web de los Equipos CyD/uploads/")
?>

