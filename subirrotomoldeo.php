<?php
	include_once "db/conexion.php";
	$molde=$_POST['molde'];
	$id_tipo_procesado=1;
	$duracion=$_POST['duracion'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	$material1=$_POST['material1'];
	$cm1=$_POST['cm1'];
	$material2=$_POST['material2'];
	$cm2=$_POST['cm2'];
	$material3=$_POST['material3'];
	$cm3=$_POST['cm3'];
	$a=$cnn->prepare("INSERT INTO rotomoldeo(molde, id_tipo_procesado, duracion, cantidad, fecha, material1, cm1, material2, cm2, material3, cm3) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
	$a->execute(array($molde, $id_tipo_procesado, $duracion, $cantidad, $fecha, $material1, $cm1, $material2, $cm2, $material3, $cm3));
	$cnn=null;
	header('location:ingproduccion.php');
?>