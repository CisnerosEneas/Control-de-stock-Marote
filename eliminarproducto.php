<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from precioslista where id_producto=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	$borrarsql='delete from preciosmayorista where id_producto=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	$borrarsql='delete from productos where id_producto=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verproducto.php');
?>