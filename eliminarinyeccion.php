<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from inyeccion where id_inyeccion=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verinyeccion.php');
?>