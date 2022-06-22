<?php
	include_once "db/conexion.php";
	$molde=$_GET['molde'];
	$duracion=$_GET['duracion'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$porcentajes=$_GET['porcentajes'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update inyeccion set molde=?, duracion=?, cantidad=?, fecha=?, material_utilizado=? where id_inyeccion=?;");
	$dato->execute(array($molde, $duracion, $cantidad, $fecha, $porcentajes, $id));
	header('location:verinyeccion.php');
?>