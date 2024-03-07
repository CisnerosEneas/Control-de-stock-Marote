<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article>
				<?php
					include_once "db/conexion.php";
					if($_GET) {
				    $id=$_GET['id'];
				    $sql_unico='SELECT * FROM pedidos WHERE id_pedido=?';
				    $gsent_unico = $cnn->prepare($sql_unico);
				    $gsent_unico->execute(array($id));
				    $resultado_unico = $gsent_unico->fetch();
					}
				?>
				<?php if ($_GET): ?>
				<center>
				</center>
				<?php endif ?>
				<center><h2>Pedidos activos</h2></center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Prioridad</th>
							<th>Nombre de pedido</th>
							<th>Nombre del cliente</th>
							<th>Fecha de pedido</th>
							<th>Dia limite pedido</th>
							<th>Fecha de entrega</th>
							<th>Direccion</th>
							<th>Detalle</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM pedidos WHERE estado=1';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
				    		<td><?php echo $dato['prioridad']; ?></td>
							<td><?php echo $dato['nombre_pedido']; ?></td>
				    		<td><?php echo $dato['nombre_cliente']; ?></td>
				    		<td><?php echo $dato['fechapedido']; ?></td>
				    		<td><?php echo $dato['diaentrega']; ?></td>
				    		<td><?php echo $dato['fechalimite']; ?></td>
				    		<td><?php echo $dato['direccion']; ?></td>
					    	<td><a href="verdetalle.php?id=<?php echo $dato['id_pedido']; ?>"><i class="bi bi-eye-fill"></i></a></td>
						    <td><a href="verpedido.php?id=<?php echo $dato['id_pedido']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarpedido.php?id=<?php echo $dato['id_pedido']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
					    </tr>
					    <?php endforeach; ?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>