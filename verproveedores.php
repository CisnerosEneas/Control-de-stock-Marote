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
					    $sql_unico='SELECT * FROM proveedores WHERE id_proveedor=?';
					    $gsent_unico = $cnn->prepare($sql_unico);
					    $gsent_unico->execute(array($id));
					    $resultado_unico = $gsent_unico->fetch();
						}
					?>
					<?php if ($_GET): ?>
					<h2>Editar proveedores</h2>
	                <form method="GET" action="editarproveedor.php">
	                    <fieldset>
	                        Nombre:
	                        <input type="text" name="name" value="<?php echo $resultado_unico['nombre']?>">
	                    </fieldset>
	                    <fieldset>
	                        Nº Telefono:
	                        <input type="number" name="phone" value="<?php echo $resultado_unico['telefono']?>">
	                    </fieldset>
	                    <fieldset>
	                        E-Mail:
	                        <input type="email" name="mail" value="<?php echo $resultado_unico['mail']?>">
	                    </fieldset>
	                    <fieldset>
	                        Pagina WEB:
	                        <input type="url" name="web" value="<?php echo $resultado_unico['web']?>">
	                    </fieldset>
	                    <fieldset>
	                        Contacto:
	                        <input type="text" name="contact" value="<?php echo $resultado_unico['contacto']?>">
	                    </fieldset>
	                    <fieldset>
                            Direccion:
                            <input type="text" name="direccion" value="<?php echo $resultado_unico['direccion']?>">
                        </fieldset>
	                    <fieldset>
	                    	Seleccione que provee
	                    	<select name="a" value="<?php echo $resultado_unico['provee']?>">
	                    		<option disabled hidden selected>Seleccion</option>
	                    		<option value="1">Plasticos</option>
	                    		<option value="2">Otros</option>
	                    	</select>
	                    </fieldset>
	                    <fieldset>
							<input type="hidden" name="id" value="<?php echo $resultado_unico['id_proveedor']?>">
						</fieldset>
	                    <fieldset>
	                        <input type="submit">
	                    </fieldset>
	                </form>
	            	<?php endif ?>
					<h2>Proveedores</h2>
				</center>
				<table class="col table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Telefono</th>
							<th>Mail</th>
							<th>Web</th>
							<th>Contacto</th>
							<th>Direccion</th>
							<th>Provee</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include_once "db/conexion.php";
							$sql_leer='SELECT * FROM proveedores ';
							$gsent = $cnn->prepare($sql_leer);
							$gsent->execute();
							$resultados = $gsent->fetchAll();
						    foreach ($resultados as $dato):
						?>
					    <tr>
						    <td><?php echo $dato['nombre']; ?></td>
						    <td>
						    	<?php
							    	if ($dato['telefono']==null) {
							    		echo 'Sin especificar';
							    	}
							    	else
							    	{
							    		echo $dato['telefono'];
							    	}
						    	?>
						    </td>
						    <td>
						    	<?php
						    	if ($dato['mail']==null) {
						    		echo 'Sin especificar/no tiene';
						    	}
						    	else
						    	{
						    		echo $dato['mail'];
						    	}
						    	?>	
						    </td>
						    <?php if($dato['web']!=null): ?>
						    <td><a href="<?php echo $dato['web']; ?>"><?php echo $dato['web']; ?></a></td>
							<?php elseif ($dato['web']==null): ?>
							<td>Sin especificar/no tiene</td>
							<?php endif; ?>
						    <td>
						    	<?php
						    		if ($dato['contacto']==null) {
						    			echo 'Sin especificar';
						    		}
						    		else
						    		{
						    			echo $dato['contacto'];
						    		}
						    	?>	
						    </td>
						    <td><?php echo $dato['direccion']; ?></td>
						    <td>
						    	<?php
						    		if ($dato['provee']==1)
						    		{
						    			echo "Plasticos";
						    		}
						    		else
						    		{
						    			echo "Otros";
						    		}
						    	?>
						    </td>
						    <td><a href="verproveedores.php?id=<?php echo $dato['id_proveedor']; ?>"><i class="bi bi-pencil-square"></i></a></td>
						    <td><a href="eliminarproveedor.php?id=<?php echo $dato['id_proveedor']; ?>" onclick="confirmar()"><i class="bi bi-trash"></i></a></td>
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