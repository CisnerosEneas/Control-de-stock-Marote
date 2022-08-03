<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
		<article class="col">
			<?php
				$id=$_GET['id'];
			?>
			<center><h2>Productos</h2></center>
			<table class="col table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio de lista</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
							$leer_sql="SELECT nomproducto FROM productos WHERE id_producto='$id'";
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadotes = $gsent->fetchAll();
						    foreach ($resultadotes as $datote):
						?>
						<td><?php echo $datote['nomproducto']; ?></td>
						<?php endforeach; ?>
						<?php
							$leer_sql="SELECT precioslista.id_producto,precioslista.preciol,productos.id_producto FROM precioslista,productos WHERE precioslista.id_producto=productos.id_producto and productos.id_producto='$id'";
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadotes1 = $gsent->fetchAll();
						    foreach ($resultadotes1 as $datote1):
						?>
						<td>
							<?php
								if($datote1['preciol']!=0)
								{
									echo "$",$datote1['preciol'];
								}
								else
								{
									echo "Sin precio lista";
								}
							?>
						<td>Sin precio lista</td>
					</tr>
				</tbody>
			</table>
			<table class="col table-striped">
				<thead>
					<tr>
						<th>PV Corp y/o x Mayor</th>
						<th>Mayor/Corp. Minimo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
							endforeach;
							$leer_sql="SELECT cantmayorista.id_cantmayorista,cantmayorista.cantidad,productos.id_producto,preciosmayorista.preciom FROM cantmayorista,productos,preciosmayorista WHERE cantmayorista.id_cantmayorista=preciosmayorista.id_cantmayorista AND preciosmayorista.id_producto=productos.id_producto AND productos.id_producto='$id'";
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadotes2 = $gsent->fetchAll();
						    foreach ($resultadotes2 as $datote2): 
						?>
						<td>$<?php echo $datote2['preciom']; ?></td>
						<td><?php echo $datote2['cantidad']; ?></td>
						<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</main>
	</body>
</html>