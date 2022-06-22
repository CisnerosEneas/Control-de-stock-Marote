<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from rotomoldeo where id_rotomoldeo=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verrotomoldeo.php');
?>