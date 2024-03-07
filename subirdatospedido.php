<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$pedido=$_POST['cliente'];
	$producto=$_POST['producto'];
	$detalle=$_REQUEST['detalle'];
	$cantidad=$_POST['cantidad'];
	$color=$_POST['color'];
	$controla=$_POST['controla'];
	$embalaje=$_POST['embalaje'];
	// Preparamos un array con los datos a ingresar del formulario
	$ipd=$cnn->prepare("INSERT INTO detalle_pedido(id_pedido, id_producto, detalle_pedido, cantidad, color, controla, embalaje) VALUES (?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$ipd->execute(array($pedido, $producto, $detalle, $cantidad, $color, $controla, $embalaje));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar los pedidos
	header('location:ingpedidos.php');
?>