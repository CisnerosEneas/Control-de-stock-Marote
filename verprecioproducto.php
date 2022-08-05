<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
		<article class="col">
			<?php
				$id=$_GET['id'];
				$leer_sql="SELECT nomproducto FROM productos WHERE id_producto='$id'";
				$gsent = $cnn->prepare($leer_sql);
				$gsent->execute();
				$resultado = $gsent->fetchAll();
			    foreach ($resultado as $titulo):
			?>
			<center><h2><?php echo $titulo['nomproducto']; ?></h2></center>
			<?php endforeach; ?>
			<table class="col table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio de lista</th>
						<th>PV Corp y/o x Mayor</th>
						<th>Mayor/Corp. Minimo</th>
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
						<?php
							endforeach;
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
						</td>
						<?php
							endforeach;
							$leer_sql="SELECT cantmayorista.id_cantmayorista,cantmayorista.cantidad,productos.id_producto,preciosmayorista.preciom FROM cantmayorista,productos,preciosmayorista WHERE cantmayorista.id_cantmayorista=preciosmayorista.id_cantmayorista AND preciosmayorista.id_producto=productos.id_producto AND productos.id_producto='$id'";
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadotes2 = $gsent->fetchAll();
						    foreach ($resultadotes2 as $datote2):
						?>
						<td>
							<?php
								if ($datote2['preciom']!=0)
								{
									echo "$".$datote2['preciom'];
								}
								else
								{
									echo "Sin PV Corp y/o x Mayor";
								}
							?>
						</td>
						<td>
							<?php
								if ($datote2['cantidad']!=0)
								{
									echo $datote2['cantidad'];
								}
								else
								{
									echo "Sin Mayor/Corp. Minimo";
								}
							?>
						</td>
						</tr>
						<td></td>
						<td></td>
						<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>