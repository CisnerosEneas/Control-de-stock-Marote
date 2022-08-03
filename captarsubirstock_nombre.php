<?php
	require_once 'db/conexion.php';
	$a=$_GET['id_producto'];
	$sql_leer="SELECT distinct nomproducto FROM productos WHERE id_producto=$a";
	$gsent = $cnn->prepare($sql_leer);
	$gsent->execute();
	$s = $gsent->fetchAll();
?>
<?php foreach($s as $c):?>
<div id="nombre_p">
	<input type="hidden" name="name" value="<?php echo $c['nomproducto']; ?>">
</div>
<?php endforeach ?>