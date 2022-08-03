<?php
	include_once "db/conexion.php";
	$id_producto=$_POST['a'];
	$id_categoria=$_POST['cat'];
	$nombre=$_POST['name'];
	$color=$_POST['color'];
	$stock_disponible=$_POST['stock'];
	$descripcion=$_POST['descripcion'];
	$a=$cnn->prepare("INSERT INTO productosalmacen(id_producto, id_categoria, nombre, color, stock_disponible, descripcion) VALUES (?,?,?,?,?,?);");
	$a->execute(array($id_producto,$id_categoria,$nombre,$color,$stock_disponible,$descripcion));
	$cnn=null;
	header('location:ingresarproducto.php');
?>