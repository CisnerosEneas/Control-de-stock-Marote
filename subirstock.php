<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$id_producto=$_POST['a'];
	$codigo=$_POST['codigo'];
	$id_categoria=$_POST['cat'];
	$nombre=$_POST['name'];
	$color=$_POST['color'];
	$stock_disponible=$_POST['stock'];
	$descripcion=$_POST['descripcion'];
	// Preparamos un array con los datos a ingresar del formulario
	$a=$cnn->prepare("INSERT INTO productosalmacen(id_producto, id_categoria, codigo, nombre, color, stock_disponible, descripcion) VALUES (?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$a->execute(array($id_producto, $id_categoria, $codigo, $nombre, $color, $stock_disponible, $descripcion));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar el stock
	header('location:ingresarproducto.php');
?>