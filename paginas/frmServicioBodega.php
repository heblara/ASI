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
		<form name="frmServicios" action="?mod=guardarServicios" method="post">
		<table id="tcontainer" width='50%' align="center">
	<caption><h1 style="font-family:'Trebuchet MS'">Servicios de bodega</h1></caption>
	<tr>
		<td>Nombre del servicio:</td>
		<td><input type="text" name="txtNombre" id="txtNombre" size="50" /></td>
	</tr>
	<tr>
		<td>Precio del servicio:</td>
		<td><input type="decimal" name="txtNombre" id="txtNombre" placeholder="$" /></td>
	</tr>
	<tr>
		<td>Agente bodega:</td>
		<td><select id="lstAerolinea" name="lstAerolinea">
			<option value="0">Elegir</option>
			<?php
			$conAgente=pg_query("SELECT * FROM agente_bodega");
			while($agente=pg_fetch_assoc($conAgente)){
			?>
			<option value="<?php echo $agente["aget_bod_id"] ?>"><?php echo $agente["nombre_aget_bod"] ?></option>
			<?php
			}
			?>
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