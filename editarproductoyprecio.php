<?php
	include_once "db/conexion.php";
	$tipo_procesado=$_GET['a'];
	$categoria=$_GET['b'];
	$cant_mayorista=$_GET['c'];
	$nombre=$_GET['nombre'];
	$preciol=$_GET['preciol'];
	$preciom=$_GET['preciom'];
	$id=$_GET['id'];
	$editar_producto=$cnn->prepare("update productos set id_tipo_procesado=?, id_categoria=?, nomproducto=?, actualizada_el=NOW() where id_producto=?;");
	$editar_producto->execute(array($tipo_procesado, $categoria, $nombre, $id));
	$cnn=null;
	$editar_preciolista=$cnn->prepare("update precioslista set preciol=? where id_producto=?;");
	$editar_preciolista->execute(array($preciol, $id));
	$cnn=null;
	$editar_cantpreciomayorist=$cnn->prepare("update preciosmayorista set id_cantmayorista=?, preciom=? where id_producto=?;");
	$editar_cantpreciomayorist->execute(array($cant_mayorista, $preciom, $id));
	$cnn=null;
	header('location:verproducto.php');
?>