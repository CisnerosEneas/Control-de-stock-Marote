<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
		<?php
			include "db/conexion.php";
			$id=$_GET['id'];
			$sql_leer="SELECT * FROM pedidos WHERE id_pedido='$id'";
			$gsent = $cnn->prepare($sql_leer);
			$gsent->execute();
			$resultados = $gsent->fetchAll();
		    foreach ($resultados as $dato):
		?>
			<article>
				<center>
					<h2><?php echo $dato['nombre_cliente']; ?></h2>
				</center>
				<p><?php echo " ".$dato['fecha_pedido']; echo " ".$dato['fecha_entrega']; echo " ".$dato['dia_de_entrega']; ?></p>
				<p><?php echo " ".$dato['direccion']; ?></p>
				<?php
					$sql_leer1="SELECT detalle_pedido.id_pedido,detalle_pedido.id_producto,detalle_pedido.detalle_pedido,pedidos.id_pedido,productos.id_producto,productos.nomproducto FROM detalle_pedido,pedidos,productos WHERE productos.id_producto=detalle_pedido.id_producto AND detalle_pedido.id_pedido=pedidos.id_pedido AND pedidos.id_pedido='$id'";
					$gsent1 = $cnn->prepare($sql_leer1);
					$gsent1->execute();
					$resultados1 = $gsent1->fetchAll();
				    foreach ($resultados1 as $dato1):
			    ?>
			    <p><?php
			    	if ($dato1['nomproducto']==" ")
			    	{
			    	 	echo "<br>";
			    	} 
			    	echo $dato1['nomproducto'];
			    ?></p>
				<p><?php echo $dato1['detalle_pedido']; ?></p>
				<?php endforeach; ?>
			</article>
			<?php endforeach; ?>
		</main>
	</body>
</html>