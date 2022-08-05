<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article class="col">
				<center>
					<?php
						if($_GET) {
					    $id=$_GET['idproducto'];
					    $sql_leer_producto="SELECT * FROM productos WHERE id_producto=?";
					    $gsent_producto = $cnn->prepare($sql_leer_producto);
					    $gsent_producto->execute(array($id));
					    $resultado_producto = $gsent_producto->fetch();
					    $sql_leer_mayorista="SELECT cantmayorista.id_cantmayorista,cantmayorista.cantidad,productos.id_producto,preciosmayorista.preciom FROM cantmayorista,productos,preciosmayorista WHERE cantmayorista.id_cantmayorista=preciosmayorista.id_cantmayorista AND preciosmayorista.id_producto=productos.id_producto AND productos.id_producto=?";
					    $gsent_mayorista = $cnn->prepare($sql_leer_mayorista);
					    $gsent_mayorista->execute(array($id));
					    $resultado_mayorista = $gsent_mayorista->fetch();
					   $sql_leer_plista="SELECT precioslista.id_producto,precioslista.preciol,productos.id_producto FROM precioslista,productos WHERE precioslista.id_producto=productos.id_producto and productos.id_producto=?";
					    $gsent_plista = $cnn->prepare($sql_leer_plista);
					    $gsent_plista->execute(array($id));
					    $resultado_plista = $gsent_plista->fetch();
						}
						if ($_GET):
					?>
					<h2>Editar producto</h2>
					<form method="GET" action="editarproductoyprecio.php">
						<fieldset>
							Nombre<input type="text" name="nombre" value="<?php echo $resultado_producto['nomproducto']; ?>">
						</fieldset>
						<fieldset>
							Procesado
							<select name="a">
								<option selected hidden disabled value="<?php echo $resultado_producto['id_tipo_procesado']; ?>">Seleccione tipo de procesado</option>
								<option value="1">Rotomoldeo</option>
								<option value="2">Inyeccion</option>
								<option value="4">Otros</option>
							</select>
						</fieldset>
						<fieldset>
							Categoria
							<select name="b">
								<option selected hidden disabled value="<?php echo $resultado_producto['id_categoria']; ?>"> Seleccione una categoria</option>
								<?php
									include "db/conexion.php";
									$sql_leer='SELECT * FROM categoria';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
								    foreach ($resultados as $dato): 
								?>
								<option value="<?php echo $dato['id_categoria']; ?>"><?php echo $dato['nombre_cat']; ?></option>
								<?php endforeach; ?>
							</select>
						</fieldset>
						<h2>Editar precios</h2>
						<fieldset>
							Precio L. <input type="number" name="preciol" step="0.01" min="0" value="<?php echo $resultado_plista['preciol']; ?>">
						</fieldset>
						<fieldset>
							Precio M. <input type="number" name="preciom" step="0.01" min="0" value="<?php echo $resultado_mayorista['preciom']; ?>">
						</fieldset>
						<fieldset>
							C. mayorista
							<select name="c">
								<option selected hidden disabled value="<?php echo $resultado_mayorista['id_cantmayorista']; ?>"> Seleccione cantidad</option>
								<?php
									$sql_leer='SELECT * FROM cantmayorista';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
								    foreach ($resultados as $dato):
								?>
								<option value="<?php echo $dato['id_cantmayorista']; ?>">
								<?php
									if ($dato['cantidad']!=null)
										{echo $dato['cantidad'];}
									else
										{echo "Sin cant mayorista";}
								?>
								</option>
								<?php endforeach; ?>
							</select>
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_producto['id_producto']; ?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif; ?>
					<h2>Productos</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Cargado</th>
							<th>Actualizado</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "db/conexion.php";
							$leer_sql='SELECT * FROM productos';
							$gsent = $cnn->prepare($leer_sql);
							$gsent->execute();
							$resultadotes = $gsent->fetchAll();
						    foreach ($resultadotes as $datote):
						?>
						<tr>
							<!-- Link a la lista de precios del producto seleccionado !-->
							<td><a href="verprecioproducto.php?id=<?php echo $datote['id_producto']; ?>"><?php echo $datote['nomproducto']; ?></a></td>
						    <td><?php echo $datote['creada_el']; ?></td>
						    <td>
						    	<?php
						    		if($datote['creada_el']==$datote['actualizada_el'])
						    			{echo 'Sin actualizar';}
						    		else
						    			{echo $datote['actualizada_el'];}
						    	?>	
						    </td>
							<td><a href="verproducto.php?idproducto=<?php echo $datote['id_producto']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarproducto.php?id=<?php echo $datote['id_producto']; ?>" onclick="return confirmar()"><i class="bi bi-trash"></i></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>