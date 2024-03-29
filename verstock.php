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
						if ($_GET): 
					?>
					<h2>Editar productos en stock</h2>
					<form method="GET" action="editarstock.php">
						<fieldset>
							Codigo<input type="text" name="codigo" value="<?php echo $resultado_unico['codigo'] ?>">
						</fieldset>
						<fieldset>
							Nombre<input type="text" name="name" value="<?php echo $resultado_unico['nombre'] ?>">
						</fieldset>
						<fieldset>
							Color<input type="text" name="color" value="<?php echo $resultado_unico['color'] ?>">
						</fieldset>
						<fieldset>
							Cantidad disp.<input type="number" name="stock" value="<?php echo $resultado_unico['stock_disponible'] ?>">
						</fieldset>
						<fieldset>
							Descripcion(opcional)<input type="text" name="descripcion" value="<?php echo $resultado_unico['descripcion'] ?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_stock'] ?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif; ?>
				</center>
			</article>
			<article class="col">
				<center>
					<h2>Productos stock</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Categoria</th>
							<th>Codigo</th>
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
					    	<td><?php echo $dato['codigo'] ?></td>
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
						    <td><a href="verstock.php?idstock=<?php echo $dato['id_stock']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarstock.php?id=<?php echo $dato['id_stock']; ?>" onclick="return confirmar()"><i class="bi bi-trash"></i></a></td>
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