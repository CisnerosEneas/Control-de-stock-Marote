<?php
	include_once "db/conexion.php";
	$id_proveedor=$_GET['b'];
	$estado=$_GET['a'];
	$precio=$_GET['precio'];
	$tipo=$_GET['tipop'];
	$color=$_GET['colorp'];
	$cantidad=$_GET['cantidad'];
	$fecha=$_GET['fecha'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update mpcomprado set id_proveedor=?, estado=?, tipo_plastico=?, color=?, precio=?, cantidad=?, fecha=? where id_compra=?;");
	$dato->execute(array($id_proveedor, $estado, $tipo, $color, $precio, $cantidad, $fecha, $id));
	header('location:vermpcomprado.php');
?>