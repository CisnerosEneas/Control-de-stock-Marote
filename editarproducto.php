<?php
	include_once "db/conexion.php";
	$categoria=$_GET['b'];
	$nombre=$_GET['name'];
	$color=$_GET['color'];
	$tipo_procesado=$_GET['a'];
	$precio=$_GET['price'];
	$stock=$_GET['stock'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update productos set id_tipo_procesado=?, id_categoria=?, precio=?, nombre=?, color=?, stock_disponible=?, actualizada_el=NOW() where id_producto=?;");
	$dato->execute(array($tipo_procesado, $categoria, $precio, $nombre, $color, $stock, $id));
	header('location:verproducto.php');
?>