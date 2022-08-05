<?php
	include_once "db/conexion.php";
	$cantm=$_POST['c'];
	$id_producto=$_POST['a'];
	$preciol=$_POST['preciol'];
	$preciom=$_POST['preciom'];
	if ($cantm!=0)
	{
		if ($preciol!=null)
		{
			$ipl=$cnn->prepare("INSERT INTO precioslista(id_producto,preciol) VALUES (?,?);");
			$ipl->execute(array($id_producto,$preciol));
		}
		if ($preciom!=null && $cantm!=null)
		{
			$ipm=$cnn->prepare("INSERT INTO preciosmayorista(id_producto,id_cantmayorista,preciom) VALUES (?,?,?);");
			$ipm->execute(array($id_producto,$cantm,$preciom));
		}
	}
	$cnn=null;
	header('location:ingresarproducto.php');
?>