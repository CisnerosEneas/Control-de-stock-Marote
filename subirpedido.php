<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Posteamos los datos a cargar del formulario pertinente
	$prioridad=$_POST['prioridad'];
	$nombre=$_POST['nombre'];
	$fechapedido=$_POST['fechapedido'];
	$fechalimite=$_POST['fechalimite'];
	$direccion=$_POST['direccion'];
	$diaentrega=$_POST['diaentrega'];
	// Preparamos un array con los datos a ingresar del formulario
	$ip=$cnn->prepare("INSERT INTO pedidos(prioridad, nombre_cliente, fecha_pedido, fecha_entrega, direccion, dia_de_entrega, estado) VALUES (?,?,?,?,?,?,?);");
	// Insertamos los datos del array en la base de datos
	$ip->execute(array($prioridad, $nombre, $fechapedido, $diaentrega, $direccion, $fechalimite,1));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ingresar los pedidos
	header('location:ingpedidos.php');
?>