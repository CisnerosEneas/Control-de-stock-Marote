<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from mocomprado where id_mocompra=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:vermocomprado.php');
?>