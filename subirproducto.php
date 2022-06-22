<?php
	include_once "db/conexion.php";
	$nombre=$_POST['name'];
	$color=$_POST['color'];
	$metodo=$_POST['a'];
	$precio=$_POST['price'];
	$stock=$_POST['stock'];
	$a=$cnn->prepare("INSERT INTO productos(nombre,color,id_tipo_procesado,precio,stock_disponible) VALUES (?,?,?,?,?);");
	$a->execute(array($nombre,$color,$metodo,$precio,$stock));
	$cnn=null;
	header('location:ingresarproducto.php');
?>