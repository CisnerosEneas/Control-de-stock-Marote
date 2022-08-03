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
					    $sql_unico='SELECT * FROM mpcomprado WHERE id_compra=?';
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
							Proveedor
							<select name="b" value="<?php echo $resultado_unico['id_proveedor']?>">
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
							Precio $<input type="number" name="precio" step="0.01" min="0" value="<?php echo $resultado_unico['precio']?>">
						</fieldset>
						<fieldset>
							Cantidad<input type="number" name="cantidad" min="0" value="<?php echo $resultado_unico['cantidad']?>">
						</fieldset>
						<fieldset>
							Fecha de compra<input type="date" name="fecha" value="<?php echo $resultado_unico['fecha']?>">
						</fieldset>
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_compra']?>">
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
							<th>Estado</th>
							<th>Precio</th>
							<th>cantidad</th>
							<th>Fecha de compra (A/M/D)</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM mpcomprado';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato ['id_proveedor'] ?></td>
						    <td><?php echo $dato['estado']; ?></td>
						    <td>$<?php echo $dato['precio']; ?></td>
						    <td><?php echo $dato['cantidad']; ?></td>
						    <td><?php echo $dato['fecha']; ?></td>
						    <td><a href="vermpcomprado.php?id=<?php echo $dato['id_compra']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarmpcomprado.php?id=<?php echo $dato['id_compra']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
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