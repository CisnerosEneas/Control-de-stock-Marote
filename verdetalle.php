<!DOCTYPE html>
<html lang="es">
	<head>
		<style id="table_style" type="text/css">
			body
			{
				font-family: Arial;
				font-size: 10pt;
			}
			table
			{
				border: 1px solid #ccc;
				border-collapse: collapse;
			}
			table th
			{
				font-weight: bold;
			}
			table th, table td
			{
				padding: 5px;
				border: 1px solid #ccc;
			}
		</style>
		<script type="text/javascript">
			function PrintTable() {
				var printWindow = window.open('', '', 'height=200,width=400');
				printWindow.document.write('<html><head><title>Table Contents</title>');
		
				//Print the Table CSS.
				var table_style = document.getElementById("table_style").innerHTML;
				printWindow.document.write('<style type = "text/css">');
				printWindow.document.write(table_style);
				printWindow.document.write('</style>');
				printWindow.document.write('</head>');
		
				//Print the DIV contents i.e. the HTML Table.
				printWindow.document.write('<body>');
				var divContents = document.getElementById("dvContents").innerHTML;
				printWindow.document.write(divContents);
				printWindow.document.write('</body>');
		
				printWindow.document.write('</html>');
				printWindow.document.close();
				printWindow.print();
			}
		</script>
	</head>
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
		<?php
			include "db/conexion.php";
			$id=$_GET['id'];
			$sql_leer="SELECT * FROM detalle_pedido,pedidos,productos WHERE productos.id_producto=detalle_pedido.id_producto AND detalle_pedido.id_pedido=pedidos.id_pedido AND pedidos.id_pedido='$id'";
			$gsent = $cnn->prepare($sql_leer);
			$gsent->execute();
			$resultados = $gsent->fetchAll();
		    foreach ($resultados as $dato):
		?>
		<br>
			<article class="col">
				<div id="dvContents">
					<table style="width:100%" cellspacing="0" rules="all" border="1">
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
							<td>Producto</td>
							<td><?php echo $dato['nomproducto']; ?></td>
						</tr>
						<tr>
							<td>Fecha Despacho</td>
							<td><?php echo $dato['diaentrega']; ?></td>
						</tr>
						<tr>
							<td>Cantidad</td>
							<td><?php echo $dato['cantidad']; ?></td>
						</tr>
						<tr>
							<td>Color</td>
							<td><?php echo $dato['color']; ?></td>
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
							<td>Embalaje</td>
							<td><?php echo $dato['embalaje']; ?></td>
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
						<tr>
							<td>Obsevaciones</td>
							<td><?php echo $dato['detalle_pedido']; ?></td>
						</tr>
					</table>
				</div>
			<br>
			<input type="button" onclick="PrintTable();" value="Imprimir"/>
			</article>
			<br>
			<?php endforeach; ?>
		</main>
	</body>
</html>