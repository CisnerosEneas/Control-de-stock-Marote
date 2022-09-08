<?php
	// Incluimos el archivo de conexion a la base de datos
	include_once "db/conexion.php";
	// Conseguimos el id del registro a "borrar"
	$id=$_GET['id'];
	// Preparamos un array con los datos a ingresar del formulario
	$dato=$cnn->prepare("update pedidos set estado=0 where id_pedido=?;");
	// Insertamos los datos del array en la base de datos
	$dato->execute(array($id));
	// Cerramos la conexion a la base de datos
	$cnn=null;
	// Enviamos al usuario a la pagina para ver los pedidos
	header('location:verpedidosactivos.php');
?>