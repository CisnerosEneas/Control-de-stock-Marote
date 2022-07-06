<?php
	include_once "db/conexion.php";
	$categoria=$_POST['b'];
	$nombre=$_POST['name'];
	$color=$_POST['color'];
	$metodo=$_POST['a'];
	$precio=$_POST['price'];
	$stock=$_POST['stock'];
	$descripcion=$_POST['descripcion'];
	$a=$cnn->prepare("INSERT INTO productos(id_categoria,nombre,color,id_tipo_procesado,precio,stock_disponible,descripcion,creada_el) VALUES (?,?,?,?,?,?,?,?);");
	$a->execute(array($categoria,$nombre,$color,$metodo,$precio,$stock,$descripcion,$creada_el));
	$cnn=null;
	header('location:ingresarproducto.php');
?>