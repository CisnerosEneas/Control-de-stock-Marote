<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Atrapamos los cambios del formulario pertinente y el id del producto en stock a modificar
	$codigo=$_GET['codigo'];
	$nombre=$_GET['name'];
	$color=$_GET['color'];
	$stock=$_GET['stock'];
	$descripcion=$_GET['descripcion'];
	$id=$_GET['id'];
	// Preparamos un array con los cambios del formulario
	$dato=$cnn->prepare("update productosalmacen set codigo=?, nombre=?, color=?, stock_disponible=?, descripcion=?, actualizada_el=NOW() where id_stock=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($codigo,$nombre,$color,$stock,$descripcion, $id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver el stock
	header('location:verstock.php');
?>