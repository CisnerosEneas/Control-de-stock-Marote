<?php
	include_once "db/conexion.php";
	$producto=$_GET['a'];
	$categoria=$_GET['b'];
	$nombre=$_GET['name'];
	$color=$_GET['color'];
	$stock=$_GET['stock'];
	$descripcion=$_GET['descripcion'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update productosalmacen set id_producto=?, id_categoria=?, nombre=?, color=?, stock_disponible=?, descripcion=?, actualizada_el=NOW() where id_stock=?;");
	$dato->execute(array($producto,$categoria,$nombre,$color,$stock,$descripcion, $id));
	header('location:verproducto.php');
?>