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
							<option value="agregarapedido">Agregar datos a pedido</option>
						</select>
					</form>
					<!-- if Pedido nuevo !-->
					<div id="nuevopedido" style="display:none;">
						<form id="nuevopedido" method="POST" action="subirpedido.php">
							<fieldset>
								<h4>Ingresar Pedido</h4>
							</fieldset>
							<fieldset>
								Prioridad del pedido
								<select name="prioridad">
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
							</fieldset>
							<fieldset>
								Nombre de cliente
								<input type="text" name="nombre">
							</fieldset>
							<fieldset>
								Fecha de pedido
								<input type="date" name="fechapedido">
							</fieldset>
							<fieldset>
								Fecha Limite
								<input type="date" name="fechalimite">
							</fieldset>
							<fieldset>
								Direccion
								<input type="text" name="direccion">
							</fieldset>
							<fieldset>
								Dia estimado de entrega
								<input type="date" name="diaentrega">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>

					<!-- if Agregar a pedido !-->
					<div id="agregarapedido" style="display:none;">
						<form id="agregarapedido" method="POST" action="subirdatospedido.php">
							<fieldset>
								<h4>Agregar a pedido</h4>
							</fieldset>
							<fieldset>
								Productos
								<select name="producto">
									<option selected hidden disabled> Seleccione tipo de producto</option>
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
							</fieldset>
							<fieldset>
								Cliente
								<select name="cliente">
									<option selected hidden disabled> Seleccione un cliente</option>
									<?php
										$sql_leer='SELECT distinct id_pedido,nombre_cliente FROM pedidos WHERE estado=1';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato): 
									?>
									<option value="<?php echo $dato['id_pedido']; ?>"><?php echo $dato['nombre_cliente']; ?></option>
									<?php endforeach; ?>
								</select>
							</fieldset>
							<fieldset>
								<textarea name="detalle" placeholder="Detalle pedido"></textarea>
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</div>
				</center>
			</article>
		</main>
	</body>
</html>