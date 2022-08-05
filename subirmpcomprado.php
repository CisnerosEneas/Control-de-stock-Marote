<?php
	include_once "db/conexion.php";
	$id_procedencia=1;
	$id_proveedor=$_POST['b'];
	$estado=$_POST['a'];
	$tipo=$_POST['tipop'];
	$color=$_POST['colorp'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	$a=$cnn->prepare("INSERT INTO mpcomprado(id_procedencia,id_proveedor,estado,tipo_plastico,color,precio,cantidad,fecha) VALUES (?,?,?,?,?,?,?,?);");
	$a->execute(array($id_procedencia,$id_proveedor,$estado,$tipo,$color,$precio,$cantidad,$fecha));
	$cnn=null;
	header('location:ingmaterial.php');
?>