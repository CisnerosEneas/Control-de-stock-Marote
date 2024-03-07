<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<script type="text/javascript">
				function mostrar(id)
				{
				    if (id == "nuevopedido")
				    {
				        $("#nuevopedido").show();
				        $("#agregarapedido").hide();
				    }
				    if (id == "agregarapedido")
				    {
				        $("#nuevopedido").hide();
				        $("#agregarapedido").show();
				    }
				}
			</script>
			<article>
				<center>
					<form action="ingpedidos.php" method="post">
						<h2>Ingresar produccion</h2>
						Seleccione
						<select name="seleccion" id="seleccion" onChange="mostrar(this.value);">
							<option selected hidden disabled>Seleccione una accion</option>
							<option value="nuevopedido">Nuevo pedido</option>
							<option value="agregarapedido">Agregar un producto a pedido</option>
						</select>
					</form>
					<!-- if Pedido nuevo !-->
					<div id="nuevopedido" style="display:none;" class="col">
						<form id="nuevopedido" method="POST" action="subirpedido.php" align="left">
							<fieldset>
								<p><h4>Ingresar Pedido</h4>
								Prioridad del pedido
								<p><select name="prioridad">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
								
								<p>Nombre de cliente:<br><input type="text" name="nombre_cliente">
								<p>Pedido:<br><input type="text" name="nombre_pedido">
								<p>Fecha de pedido:<br><input type="date" name="fechapedido">
								<p>Fecha limite:<br><input type="date" name="fechalimite">
								<p>Dia estimado de entrega:<br><input type="date" name="diaentrega">
								<p>Responsable:<br><input type="text" name="responsable">	
								<p>Entrega:<br><input type="varchar" name="entrega">
								<p>Dirección:<br><input type="varchar" name="direccion">
								<p>Telefono:<br><input type="varchar" name="telefono">
								<p>Numero de DNI:<br><input type="int" name="dni">
								<p><input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if Agregar a pedido !-->
					<div id="agregarapedido" style="display:none;" align="left" class="col">
						<form id="agregarapedido" method="POST" action="subirdatospedido.php">
							<fieldset>
								<h4>Agregar producto a pedido</h4>
								<p>Productos:<br><select name="producto">
									<option selected hidden disabled> Seleccione tipo de producto:<br></option>
									<?php
										include "db/conexion.php";
										$sql_leer='SELECT distinct id_producto,nomproducto FROM productos';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato): 
									?>
									<option value="<?php echo $dato['id_producto']; ?>"><?php echo $dato['nomproducto']; ?></option>
									<?php endforeach; ?>
								</select>
								<p>Pedido:<br><select name="cliente">
									<option selected hidden disabled> Seleccione un pedido</option>
									<?php
										$sql_leer='SELECT distinct id_pedido,nombre_pedido FROM pedidos WHERE estado=1';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato): 
									?>
									<option value="<?php echo $dato['id_pedido']; ?>"><?php echo $dato['nombre_pedido']; ?></option>
									<?php endforeach; ?>
								</select>
								<p>Cantidad:<br><input type="number" name="cantidad">
								<p>Color:<br><input type="text" name="color">
								<p>Controla:<br><input type="text" name="controla">
								<p>Embalaje:<br><input type="text" name="embalaje">
								<p><textarea name="detalle" placeholder="Observaciones"></textarea>
								<p><input type="submit">
							</fieldset>
						</form>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>