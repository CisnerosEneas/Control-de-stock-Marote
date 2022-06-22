function confirmar()
{
	if (confirm("¿Desea eliminar los datos ingresados?") == true)
	{
		alert('Eliminado con exito');
		return true;
	}
	else
	{
		return false;
	}
};