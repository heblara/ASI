<table width="100%" align="center">
	<tr style="text-align:center;" id="opciones">
		<td>
			<table align="center">
			<tr>
				<td><img src='img/file_add.png' width="24" /><br>Agregar</td>
		<td><img src='img/file_edit.png' width="24" /><br>Modificar</td>
		<td><img src='img/file_delete.png' width="24" /><br>Eliminar</td>
		<td><img src='img/file_search.png' width="24" /><br>Buscar</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>
		<form name="frmServicios" action="?mod=guardarAereo" method="post">
		<table id="tcontainer" width='50%' align="center">
	<caption><h1 style="font-family:'Trebuchet MS'">Agregar cargas por transporte aéreo</h1></caption>
	<tr>
		<td>Numero de vuelo:</td>
		<td><input type="number" name="txtVuelo" id="txtVuelo" /></td>
	</tr>
	<tr>
		<td>Aerol&iacute;nea:</td>
		<td><select id="lstAerolinea" name="lstAerolinea">
			<option value="1">Avianca/TACA</option>
			<option value="2">American Airlines</option>
			<option value="3">United Airlines</option>
			<option value="4">Mexicana</option>
			<option value="5">Iberia</option>
		</select></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="txtGuardar" id="txtGuardar" value="Guardar datos"></td>
	</tr>
</table>
</form>	
</td>
	</tr>
</table>