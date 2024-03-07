<!DOCTYPE html>
<html lang="es">
	<head>
		<style>
		td, th {
		  border: 1px solid;
		  text-align: left;
		  padding: 8px;
		}
		</style>
	</head>
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
		<?php endforeach; ?>
			<article class="col">
			<table>
			  <tr>
			    <th>Pedido N°</th>
			    <th><?php echo $dato['nombre_pedido']; ?></th>
			  </tr>
			  <tr>
			    <td>Cliente</td>
			    <td><?php echo $dato['nombre_cliente']; ?></td>
			  </tr>
			  <tr>
			    <td>Fecha</td>
			    <td><?php echo $dato['fechapedido']; ?></td>
			  </tr>
			  <tr>
			    <td>Fecha Despacho</td>
			    <td><?php echo $dato['diaentrega']; ?></td>
			  </tr>
			  <tr>
			    <td>Responsable</td>
			    <td><?php echo $dato['responsable']; ?></td>
			  </tr>
			  <tr>
			    <td>Controla</td>
			    <td><?php echo $dato['controla']; ?></td>
			  </tr>
			  <tr>
			    <td>Entrega Vía</td>
			    <td><?php echo $dato['entrega']; ?></td>
			  </tr>
			  <tr>
			    <td>Dirección</td>
			    <td><?php echo $dato['direccion']; ?></td>
			  </tr>
			  <tr>
			    <td>Recibe / Telefono</td>
			    <td><?php echo $dato['telefono']; ?></td>
			  </tr>
			  <tr>
			    <td>DNI</td>
			    <td><?php echo $dato['dni']; ?></td>
			  </tr>

			</table>
				</p>
				<button onclick="window.print()">Imprimir</button>
			</article>
		</main>
	</body>
</html>