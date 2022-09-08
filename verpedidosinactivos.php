<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article>
				<center><h2>Pedidos inactivos</h2></center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Prioridad</th>
							<th>Nombre del cliente</th>
							<th>Fecha de pedido</th>
							<th>Dia limite pedido</th>
							<th>Fecha de entrega</th>
							<th>Direccion</th>
							<th>Detalle</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM pedidos WHERE estado=0';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
				    		<td><?php echo $dato['prioridad']; ?></td>
				    		<td><?php echo $dato['nombre_cliente']; ?></td>
				    		<td><?php echo $dato['fecha_pedido']; ?></td>
				    		<td><?php echo $dato['dia_de_entrega']; ?></td>
				    		<td><?php echo $dato['fecha_entrega']; ?></td>
				    		<td><?php echo $dato['direccion']; ?></td>
					    	<td><a href="verdetalle.php?id=<?php echo $dato['id_pedido']; ?>"><i class="bi bi-eye-fill"></i></a></td>
					    </tr>
					    <?php endforeach; ?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>