<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from mbruto where id_materia=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verbruto.php');
?>