<?php
	include_once "db/conexion.php";
	$molde=$_GET['molde'];
	$duracion=$_GET['duracion'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$material_utilizado=$_GET['material_utilizado'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update rotomoldeo set molde=?, duracion=?, cantidad=?, fecha=?, material_utilizado=? where id_rotomoldeo=?;");
	$dato->execute(array($molde, $duracion, $cantidad, $fecha, $material_utilizado, $id));
	header('location:verrotomoldeo.php');
?>