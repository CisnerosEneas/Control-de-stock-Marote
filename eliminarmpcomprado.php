<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from mpcomprado where id_compra=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:vermpcomprado.php');
?>