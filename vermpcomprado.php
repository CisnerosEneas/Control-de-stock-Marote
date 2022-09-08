<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article class="col">
				<center>
					<?php
						include_once "db/conexion.php";
						if($_GET) {
					    $id=$_GET['id'];
					    $sql_unico='SELECT * FROM mpcomprado WHERE id_mpcompra=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<form method="GET" action="editarmpcomprado.php">
						<fieldset>
							<h4>Editar plastico comprado</h4>
						</fieldset>
						<fieldset>
							Codigo<input type="text" name="codigo" value="<?php echo $resultado_unico['codigo']?>">
						</fieldset>
						<fieldset>
							Proveedor
							<select name="b" value="<?php echo $resultado_unico['id_proveedor']?>">
								<option selected hidden disabled>Proveedores</option>
							<?php
								include_once "db/conexion.php";
								$sql_leer='SELECT * FROM proveedores WHERE provee=1';
								$gsent = $cnn->prepare($sql_leer);
								$gsent->execute();
								$resultados = $gsent->fetchAll();
							    foreach ($resultados as $dato):
							?>
								<option value="<?php echo $dato['id_proveedor']; ?>"><?php echo $dato['nombre']; ?></option>
							<?php
								endforeach;
							?>
							</select>
						</fieldset>
						<fieldset>
							Estado
							<select name="a" value="<?php echo $resultado_unico['estado']?>">
								<option value="pellets">Pellets</option>
								<option value="molienda">Molienda</option>
								<option value="polvo">Polvo</option>
								<option value="agrumado">Agrumado</option>
							</select>
						</fieldset>
						<fieldset>
							Tipo de plastico
							<select name="tipop" value="<?php echo $resultado_unico['tipo_plastico']?>">
								<option value="polietileno">Polietileno</option>
								<option value="polipropileno">Polipropileno</option>
							</select>
						</fieldset>
						<fieldset>
							Color<input type="text" name="colorp" value="<?php echo $resultado_unico['color']?>">
						</fieldset>
						<fieldset>
							Precio $<input type="number" name="precio" step="0.01" min="0" value="<?php echo $resultado_unico['precio']?>">
						</fieldset>
						<fieldset>
							Cantidad<input type="number" name="cantidad" min="0" value="<?php echo $resultado_unico['cantidad']?>">
						</fieldset>
						<fieldset>
							Fecha de compra<input type="date" name="fecha" value="<?php echo $resultado_unico['fecha']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_mpcompra']?>">
						</fieldset>
						<fieldset>
							<input type="submit">
						</fieldset>
					</form>
					<?php endif ?>
					<h2>Plastico comprado</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Proveedor</th>
							<th>Codigo</th>
							<th>Estado</th>
							<th>Tipo de plastico</th>
							<th>Color</th>
							<th>Precio</th>
							<th>Cantidad (KG)</th>
							<th>Fecha de compra (A/M/D)</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT id_mpcompra,codigo,estado,tipo_plastico,color,precio,cantidad,fecha FROM mpcomprado';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
					    	<?php
								$sql_leer1="SELECT mpcomprado.id_mpcompra, mpcomprado.id_proveedor, proveedores.nombre, proveedores.id_proveedor FROM mpcomprado,proveedores WHERE proveedores.id_proveedor=mpcomprado.id_proveedor and mpcomprado.id_mpcompra='$dato[id_mpcompra]'";
								$gsent1 = $cnn->prepare($sql_leer1);
								$gsent1->execute();
								$resultados1 = $gsent1->fetchAll();
						    	foreach ($resultados1 as $dato1):
							?>
						    <td><?php echo $dato1['nombre']; ?></td>
							<?php
								endforeach;
								if ($resultados1==null)
								{
									echo '<td>Sin especificar</td>';
								}
							?>
							<td><?php echo $dato['codigo']; ?></td>
						    <td><?php echo $dato['estado']; ?></td>
						    <td><?php echo $dato['tipo_plastico']; ?></td>
						    <td><?php echo $dato['color']; ?></td>
						    <td>
						    	<?php
						    		if($dato['precio']!=0)
						    		{
						    			echo '$'.$dato['precio'];
						    		}
						    		else
						    		{
						    			echo 'Sin especificar';
						    		}
								?>
							</td>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td>
						    	<?php
						    		if($dato['fecha']!=null)
						    		{
						    			echo $dato['fecha'];
						    		}
						    		else
						    		{
						    			echo 'Sin especificar';
						    		}
								?>
							</td>
						    <td><a href="vermpcomprado.php?id=<?php echo $dato['id_mpcompra']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarmpcomprado.php?id=<?php echo $dato['id_mpcompra']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
					    </tr>
						<?php
							endforeach
						?>
					</tbody>
				</table>
			</article>
		</main>
	</body>
</html>