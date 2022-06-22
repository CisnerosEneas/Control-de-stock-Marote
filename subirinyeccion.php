<?php
	include_once "db/conexion.php";
	$molde=$_POST['molde'];
	$id_tipo_procesado=2;
	$duracion=$_POST['duracion'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	$porcentajes=$_POST['porcentajes'];
	$a=$cnn->prepare("INSERT INTO inyeccion(molde,id_tipo_procesado,duracion,cantidad,fecha,material_utilizado) VALUES (?,?,?,?,?,?);");
	$a->execute(array($molde,$id_tipo_procesado,$duracion,$cantidad,$fecha,$porcentajes));
	$cnn=null;
	header('location:ingproduccion.php');
?>