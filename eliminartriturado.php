<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from triturado where id_triturado=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:vertriturado.php');
?>