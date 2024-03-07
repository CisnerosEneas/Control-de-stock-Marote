<!DOCTYPE html>
<html lang="es">
	<?php include "modulos/head.php" ?>
	<body class="bg-dark text-white">
		<?php include "modulos/navheader.php" ?>
			<article>
                <center>
                    <h2>Ingresar proveedores</h2>
                    <form method="post" action="subirproveedor.php">
                        <fieldset>
                        <p>Nombre:<br><input type="text" name="name" required>
                        <p>Nº Telefono:<br><input type="number" name="phone" required>
                        <p>E-Mail:<br><input type="email" name="mail" required>
                        <p>Pagina WEB:<br><input type="url" name="web">
                        <p>Contacto:<br><input type="text" name="contact" required>
                        <p>Direccion:<br><input type="text" name="direccion" required>
                        <p>Seleccione que provee:<br><select name="a">
                        		<option disabled hidden selected>Seleccion</option>
                        		<option value="1">Plasticos</option>
                        		<option value="2">Otros</option>
                        	</select>
                        <p><input type="submit">
                        </fieldset>
                    </form>
                </center>
			</article>
		</main>
	</body>
</html>