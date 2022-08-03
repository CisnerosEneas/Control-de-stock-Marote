<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article class="col">
				<center>
					<?php
						if($_GET) {
					    $id=$_GET['idstock'];
					    $sql_unico='SELECT * FROM productosalmacen WHERE id_stock=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<h2>Editar productos en stock</h2>
					<form method="GET" action="editarproducto.php">
						<fieldset>
							Producto
							<select name="a" value="<?php echo $resultado_unico['id_producto']; ?>">
								<option selected hidden disabled> Seleccione tipo de producto</option>
								<?php
									$sql_leer='SELECT * FROM productos';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
								    foreach ($resultados as $dato): 
								?>
								<option value="<?php echo $dato['id_producto']; ?>"><?php echo $dato['nomproducto']; ?></option>
								<?php endforeach; ?>
							</select>
						</fieldset>
						<fieldset>
							Categoria
							<select name="b" value="<?php echo $resultado_unico['id_categoria']; ?>">
								<option selected hidden value="<?php echo $resultado_unico['id_categoria']; ?>" > Seleccione una categoria</option>
								<?php
									$leer_sql='SELECT * FROM categoria';
									$gsent = $cnn->prepare($leer_sql);
									$gsent->execute();
									$resultaditos = $gsent->fetchAll();
								    foreach ($resultaditos as $datito): 
								?>
								<option value="<?php echo $datito['id_categoria']; ?>"><?php echo $datito['nombre_cat']; ?></option>
								<?php endforeach; ?>
							</select>
						</fieldset>
						<fieldset>
							Nombre<input type="text" name="name" value="<?php echo $resultado_unico['nombre']?>">
						</fieldset>
						<fieldset>
							Color<input type="text" name="color" value="<?php echo $resultado_unico['color']?>">
						</fieldset>
						<fieldset>
							Cantidad disp.<input type="number" name="stock" value="<?php echo $resultado_unico['stock_disponible']?>">
						</fieldset>
						<fieldset>
							Descripcion(opcional)<input type="text" name="descripcion" value="<?php echo $resultado_unico['descripcion']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_stock']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif; ?>
				</center>
				<center><h2>Productos</h2></center>
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
							<!-- Link a la lista de precios del producto !-->
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
			<article class="col">
				<center>
					<h2>Productos</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Categoria</th>
							<th>Nombre</th>
							<th>Color</th>
							<th>Cantidad disp.</th>
							<th>Cargado</th>
							<th>Actualizado</th>
							<th>Descrip.</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_leer='SELECT * FROM productosalmacen';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
					    	<td>
					    		<?php
					    			switch ($dato['id_categoria'])
					    			{
					    				case '1':
					    					echo "Llaveros";
					    					break;
				    					case '2':
					    					echo "Contenedores";
					    					break;
						    			case '3':
						    					echo "Envases";
						    					break;
						    			case '4':
					    					echo "Soportes";
					    					break;
				    					case '5':
					    					echo "Baño";
					    					break;
						    			case '6':
						    					echo "Ciclismo";
						    					break;
						    			case '7':
					    					echo "Macetas";
					    					break;
				    					case '8':
					    					echo "Mascotas";
					    					break;
					    				case '9':
					    					echo "Tachos";
					    					break;
				    					case '10':
					    					echo "Asientos";
					    					break;
					    			}
					    		?>
					    	</td>
						    <td><?php echo $dato['nombre']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td><?php echo $dato['stock_disponible']; ?></td>
						    <td><?php echo $dato['creada_el']; ?></td>
						    <td>
						    	<?php
						    		if($dato['creada_el']==$dato['actualizada_el'])
						    			{echo 'Sin actualizar';}
						    		else
						    			{echo $dato['actualizada_el'];}
						    	?>	
						    </td>
						    <td>
						    	<?php
							    	if($dato['descripcion']==null)
							    		{echo 'Sin descripcion';}
								    else
								    	{echo $dato['descripcion'];}
								?>
								</td>
						    <td><a href="verproducto.php?idstock=<?php echo $dato['id_stock']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarproducto.php?id=<?php echo $dato['id_stock']; ?>" onclick="return confirmar()"><i class="bi bi-trash"></i></a></td>
					    </tr>
						<?php
							endforeach;
						?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>