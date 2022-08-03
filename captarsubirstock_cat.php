<?php
	require_once 'db/conexion.php';
	$a=$_GET['id_producto'];
	$sql_leer="SELECT productos.id_producto,productos.id_categoria,productosalmacen.id_stock FROM productos,productosalmacen where productosalmacen.id_stock=$a and productosalmacen.id_stock=productos.id_producto";
	$gsent = $cnn->prepare($sql_leer);
	$gsent->execute();
	$s = $gsent->fetchAll();
?>
<?php foreach($s as $c):?>
<div id="p_categoria">
	<input type="hidden" name="cat" value="<?php echo $c['id_categoria']; ?>">
</div>
<?php endforeach ?>