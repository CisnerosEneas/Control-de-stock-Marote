<?php
	include_once "db/conexion.php";
	$forma=$_GET['forma'];
	$color=$_GET['color'];
	$tipo_plastico=$_GET['tipo'];
	$cantidad=$_GET['cantidad'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update mbruto set forma=?, color=?, tipo_plastico=?, cantidad=? where id_materia=?;");
	$dato->execute(array($forma, $color, $tipo_plastico, $cantidad, $id));
	header('location:verbruto.php');
?>