<?php
	include_once "db/conexion.php";
	$id_proveedor=$_GET['b'];
	$material=$_GET['material'];
	$precio=$_GET['precio'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update mocomprado set id_proveedor=?, material=?, precio=?, cantidad=?, fecha=? where id_compra=?;");
	$dato->execute(array($id_proveedor, $material, $precio, $cantidad, $fecha, $id));
	header('location:vermocomprado.php');
?>