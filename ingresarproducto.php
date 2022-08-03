<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
		<script type="text/javascript">
			function mostrar(id)
			{
			    if (id == "productos")
			    {
			        $("#productos").show();
			        $("#precios").hide();
			        $("#stock").hide();
			    }

			    if (id == "precios")
			    {
			        $("#productos").hide();
			        $("#precios").show();
			        $("#stock").hide();
			    }

			    if (id == "stock")
			    {
			        $("#productos").hide();
			        $("#precios").hide();
			        $("#stock").show();
			    }
			}
		</script>
			<article class="col">
				<center>
					<form action="ingresarproducto.php" method="post">
						<h2>Ingresar Productos</h2>
						<select name="metodo" id="metodo" onChange="mostrar(this.value);">
							<option selected hidden disabled>Seleccione categoria a ingresar</option>
							<option value="productos">Productos</option>
							<option value="precios">Precios</option>
							<option value="stock">Stock</option>
						</select>
					</form>
			<article>
				<div id="productos" style="display:none">
					<center>
						<h2>Ingresar productos</h2>
						<form method="POST" action="subirproducto.php">
							<fieldset>
								Nombre<input type="text" name="nombre">
							</fieldset>
							<fieldset>
								Procesado
								<select name="a">
									<option selected hidden disabled>Seleccione tipo de procesado</option>
									<option value="1">Rotomoldeo</option>
									<option value="2">Inyeccion</option>
									<option value="4">Otros</option>
								</select>
							</fieldset>
							<fieldset>
								Categoria
								<select name="b">
									<option selected hidden disabled> Seleccione una categoria</option>
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
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</center>
				</div>
			</article>
			<article>
				<div id="precios" style="display:none">
					<center>
						<h2>Ingresar precios</h2>
						<form method="POST" action="subirprecios.php">
							<fieldset>
								Producto
								<select name="a">
									<option selected hidden disabled> Seleccione tipo de producto</option>
									<?php
										$sql_leer='SELECT distinct * FROM productos';
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
								Precio L. <input type="number" name="preciol" step="0.01" min="0">
							</fieldset>
							<fieldset>
								Precio M. <input type="number" name="preciom" step="0.01" min="0">
							</fieldset>
							<fieldset>
								C. mayorista
								<select name="c">
									<option selected hidden disabled> Seleccione cantidad</option>
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
								<?php
									$sql_leer='SELECT id_producto FROM productos';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
							    	foreach ($resultados as $dato):
							   	?>
								<input type="hidden" name="id_producto" value="id_producto">
							</fieldset>
							<?php endforeach; ?>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</center>
				</div>
			</article>
			<article>
				<div id="stock" style="display:none">
					<center>
						<h2>Ingresar stock de productos</h2>
						<form method="POST" action="subirstock.php">
							<fieldset>
								Producto
								<select name="a" id="t_producto">
									<option selected hidden disabled> Seleccione tipo de producto</option>
									<?php
										$sql_leer='SELECT distinct * FROM productos';
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
								<div id="p_categoria">
								</div>
							</fieldset>
							<fieldset>
								<div id="nombre_p">
								</div>
							</fieldset>
							<fieldset>
								Color<input type="text" name="color">
							</fieldset>
							<fieldset>
								Cantidad disp.<input type="number" name="stock" min="0">
							</fieldset>
							<fieldset>
								Descripcion(opcional)<input type="text" name="descripcion">
							</fieldset>
							<fieldset>
								<input type="submit">
							</fieldset>
						</form>
					</center>
				</div>
			</article>
		</main>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#t_producto").change(function(){
					$.get("captarsubirstock_cat.php","id_producto="+$("#t_producto").val(), function(data){
						$("#p_categoria").html(data);
						console.log(data);
					});
			  	});
			});
			$(document).ready(function(){
				$("#t_producto").change(function(){
					$.get("captarsubirstock_nombre.php","id_producto="+$("#t_producto").val(), function(data){
						$("#nombre_p").html(data);
					});
			  	});
			});
		</script>
	</body>
</html>