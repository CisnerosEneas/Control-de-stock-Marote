<?php
	include_once "db/conexion.php";
	$id_proveedor=$_GET['b'];
	$estado=$_GET['a'];
	$precio=$_GET['precio'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update mpcomprado set id_proveedor=?, estado=?, precio=?, cantidad=?, fecha=? where id_compra=?;");
	$dato->execute(array($id_proveedor, $estado, $precio, $cantidad, $fecha, $id));
	header('location:vermpcomprado.php');
?>