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
						<form method="POST" action="subirproducto.php" align="left">
						<h4>Ingresar productos</h4>
							<fieldset>
							<p>Nombre:<br><input type="text" name="nombre">
							<p>Codigo:<br><input type="text" name="codigo">
							<p>Procesado:<br><select name="a">
									<option selected hidden disabled>Seleccione tipo de procesado</option>
									<option value="1">Rotomoldeo</option>
									<option value="2">Inyeccion</option>
									<option value="4">Otros</option>
								</select>
							<p>Categoria:<br><select name="b">
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
								<p><input type="submit">
							</fieldset>
						</form>
					</center>
				</div>
			</article>
			<article>
				<div id="precios" style="display:none">
					<center>
						<form method="POST" action="subirprecios.php" align="left">
						<h4>Ingresar precios</h4>
							<fieldset>
								<p>Producto:<br><select name="a">
									<option selected hidden disabled value="0"> Seleccione tipo de producto</option>
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
								<p>Precio Lista:<br><input type="number" name="preciol" step="0.01" min="0">
								<p>Precio Corp y/o x Mayor:<br><input type="number" name="preciom" step="0.01" min="0">
								<p>Mayor/Corp. Minimo:<br><select name="c">
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
								<?php
									$sql_leer='SELECT id_producto FROM productos';
									$gsent = $cnn->prepare($sql_leer);
									$gsent->execute();
									$resultados = $gsent->fetchAll();
							    	foreach ($resultados as $dato):
							   	?>
								<input type="hidden" name="id_producto" value="id_producto">
							<?php endforeach; ?>
							<p><input type="submit">
							</fieldset>
						</form>
					</center>
				</div>
			</article>
			<article>
				<div id="stock" style="display:none">
					<center>
						<form method="POST" action="subirstock.php" align="left">
						<h4>Ingresar stock de productos</h4>
							<fieldset>
							<p>Producto:<br><select name="a" id="t_producto">
									<option selected hidden disabled> Seleccione tipo de producto</option>
									<?php
										$sql_leer='SELECT distinct id_producto,nomproducto FROM productos';
										$gsent = $cnn->prepare($sql_leer);
										$gsent->execute();
										$resultados = $gsent->fetchAll();
									    foreach ($resultados as $dato): 
									?>
									<option value="<?php echo $dato['id_producto']; ?>"><?php echo $dato['nomproducto']; ?></option>
									<?php endforeach; ?>
								</select>
								<p>Codigo:<br><input type="text" name="codigo">
								<div id="p_categoria">
								</div>
								<div id="nombre_p">
								</div>
								<p>Color:<br><input type="text" name="color">
								<p>Cantidad disponible:<br><input type="number" name="stock" min="0">
								<p>Descripcion:<br><input type="text" name="descripcion">
								<p><input type="submit">
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