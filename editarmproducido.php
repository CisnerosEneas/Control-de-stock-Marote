<?php
	include_once "db/conexion.php";
	$molienda=$_GET['molienda'];
	$tipo=$_GET['tipo'];
	$cantidad=$_GET['cantidad'];
	$color=$_GET['color'];
	$estado=$_GET['estado'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update mproducido set tipo_molienda=?, tipo_plastico=?, cantidad=?, color=?, estado=?, fecha=? where id_producido=?;");
	$dato->execute(array($molienda, $tipo, $cantidad, $color, $estado, $fecha, $id));
	header('location:verproducido.php');
?>