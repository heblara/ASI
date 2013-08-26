<?php 
include("header.php");
extract($_POST);
$objSisnej=new Sisnej;
$respuesta = new stdClass();
$cuenta=array();
$cuenta[0]=$txtNombre;
$cuenta[1]=$txtCarne;
$cuenta[2]=$txtFechaExp;
$cuenta[3]=$txtAcuerdo;
$cuenta[4]=$txtFechaAcuerdo;
$cuenta[5]=$txtDUI;
$cuenta[6]=$txtNombreDUI;
$cuenta[7]=$txtDireccion;
$cuenta[8]=$paises;
$cuenta[9]=$estados;
$cuenta[10]=$txtEmail;
$cuenta[11]=$txtMovil;
if($txtNombre==""){
	$respuesta->mensaje=3;
}
$consultarCEU=$objSisnej->consultar_ceu($txtEmail);
if($consultarCEU->rowCount()>0){
	$respuesta->mensaje = "1";
    //echo "Esa cuenta ya existe, no se pueden duplicar registros";
}else{
	if($guardarCuenta=$objSisnej->crear_cuenta($cuenta)){
		$mensaje="<h1>Validaci&oacute;n de correo electr&oacute;nico</h1>
		<br><p>
		Ha recibido este correo electr&oacute;nico para poder validar su Cuenta Electrónica Única en 
		el Sistema de Notificación Judicial de la Corte Suprema de Judicial.
		<br>Haga clic en el siguiente enlace <a href='http://localhost/SISNEJ/index.php?mod=validarcuenta&ceu=".base64_encode($txtEmail)."'>Clic aqui para validar</a>
		</p>
		";
		if(Enviar_Email($txtEmail,$txtNombre,$mensaje,"Notificación Electrónica Judicial Corte Suprema de Justicia","","Validación de correo electronico","")){
			$error="no";
			$a++;
		}
		$usuario = array($txtEmail,$txtEmail,"Abogado","0");
		$objSisnej->guardar_usuario($usuario);
		//echo "<br><b>Se ha creado la cuenta, un correo ha sido enviado a la cuenta personal del usuario a espera de validar dicha cuenta.</b><br>";
		$respuesta->mensaje = "2";
	}
}
echo json_encode($respuesta);
/*print_r($_POST);
print_r($cuenta);*/
?>