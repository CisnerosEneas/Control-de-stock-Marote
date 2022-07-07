<?php
	include_once "db/conexion.php";
	$categoria=$_GET['b'];
	$nombre=$_GET['name'];
	$color=$_GET['color'];
	$metodo=$_GET['a'];
	$preciolist=$_GET['price'];
	$cmayorista=$_GET['cantminmayorist'];
	$pmayorista=$_GET['preciominmayorist'];
	$stock=$_GET['stock'];
	$descripcion=$_GET['descripcion'];
	$id=$_GET['id'];
	$dato=$cnn->prepare("update productos set id_tipo_procesado=?, id_categoria=?, precio_de_lista=?, precio_mayorista=?, cantidad_min_mayorista=?, nombre=?, color=?, stock_disponible=?, descripcion=?, actualizada_el=NOW() where id_producto=?;");
	$dato->execute(array($metodo,$categoria,$preciolist,$pmayorista,$cmayorista,$nombre,$color,$stock,$descripcion, $id));
	header('location:verproducto.php');
?>