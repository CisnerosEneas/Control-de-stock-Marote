<?php	
	include_once "db/conexion.php";
	$de=$_GET['id'];
	$borrarsql='delete from proveedores where id_proveedor=?';
	$dssf=$cnn->prepare($borrarsql);
	$dssf->execute(array($de));
	header('location:verproveedor.php');
?>