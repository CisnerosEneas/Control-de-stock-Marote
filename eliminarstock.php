<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from productosalmacen where id_stock=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	$cnn=null;
	header('location:verstock.php');
?>