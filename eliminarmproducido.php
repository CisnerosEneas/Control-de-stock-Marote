<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from mproducido where id_producido=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verproducido.php');
?>