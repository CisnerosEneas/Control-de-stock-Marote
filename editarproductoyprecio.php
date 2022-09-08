<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar de lo formularios pertinentes
	// Producto
	$codigo=$_GET['codigo'];
	$tipo_procesado=$_GET['a'];
	$categoria=$_GET['b'];
	$nombre=$_GET['nombre'];
	// Cant y precio mayorista
	$cant_mayorista=$_GET['c'];
	$preciom=$_GET['preciom'];
	// Precio lista
	$preciol=$_GET['preciol'];
	// ID de producto
	$id=$_GET['id'];
	// Preparamos un array con los datos a ingresar del formulario
	$editar_producto=$cnn->prepare("update productos set codigo=?, id_tipo_procesado=?, id_categoria=?, nomproducto=?, actualizada_el=NOW() where id_producto=?;");
	// Insertamos los datos del array en la base de datos
	$editar_producto->execute(array($codigo, $tipo_procesado, $categoria, $nombre, $id));
	// Preparamos un array con los datos a ingresar del formulario
	$editar_preciolista=$cnn->prepare("update precioslista set preciol=? where id_producto=?;");
	// Insertamos los datos del array en la base de datos
	$editar_preciolista->execute(array($preciol, $id));
	// Preparamos un array con los datos a ingresar del formulario
	$editar_cantpreciomayorist=$cnn->prepare("update preciosmayorista set id_cantmayorista=?, preciom=? where id_producto=?;");
	// Insertamos los datos del array en la base de datos
	$editar_cantpreciomayorist->execute(array($cant_mayorista, $preciom, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver los productos
	header('location:verproducto.php');
?>