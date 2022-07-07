<?php
	include_once "db/conexion.php";
	$categoria=$_POST['b'];
	$nombre=$_POST['name'];
	$color=$_POST['color'];
	$metodo=$_POST['a'];
	$preciolist=$_POST['price'];
	$cmayorista=$_POST['cantminmayorist'];
	$pmayorista=$_POST['preciominmayorist'];
	$stock=$_POST['stock'];
	$descripcion=$_POST['descripcion'];
	$a=$cnn->prepare("INSERT INTO productos(id_tipo_procesado,id_categoria,precio_de_lista,precio_mayorista,cantidad_min_mayorista,nombre,color,stock_disponible,descripcion,creada_el) VALUES (?,?,?,?,?,?,?,?,?,?);");
	$a->execute(array($metodo,$categoria,$preciolist,$pmayorista,$cmayorista,$nombre,$color,$stock,$descripcion,$creada_el));
	$cnn=null;
	header('location:ingresarproducto.php');
?>