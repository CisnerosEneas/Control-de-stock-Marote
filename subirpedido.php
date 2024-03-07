<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$prioridad=$_POST['prioridad'];
	$nombre_cliente=$_POST['nombre_cliente'];
	$nombre_pedido=$_POST['nombre_pedido'];
	$fechapedido=$_POST['fechapedido'];
	$fechalimite=$_POST['fechalimite'];
	$diaentrega=$_POST['diaentrega'];
	$responsable=$_POST['responsable'];
	$entrega=$_POST['entrega'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$dni=$_POST['dni'];

	// Preparamos un array con los datos a ingresar del formulario
	$ip=$cnn->prepare("INSERT INTO pedidos(prioridad, nombre_cliente, nombre_pedido, fechapedido, fechalimite, diaentrega, responsable, entrega, direccion, telefono, dni, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$ip->execute(array($prioridad, $nombre_cliente, $nombre_pedido, $fechapedido, $fechalimite, $diaentrega, $responsable, $entrega, $direccion, $telefono, $dni,1));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar los pedidos
	header('location:ingpedidos.php');
?>