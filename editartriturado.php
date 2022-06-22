<?php
	include_once "db/conexion.php";
	$cantidad=$_GET['cantidad'];
	$tipo_de_plastico=$_GET['a'];
	$color=$_GET['color'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update triturado set cantidad=?, tipo_de_plastico=?, color=?, fecha=? where id_triturado=?;");
	$dato->execute(array($cantidad, $tipo_de_plastico, $color, $fecha, $id));
	header('location:vertriturado.php');
?>