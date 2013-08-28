<?php
$id=base64_decode($_GET["id"]);
$consultarUsuario=pg_query("Select * from usuario where idUser='".$id."'");
$usuario=pg_fetch_assoc($consultarUsuario);
if($resetearContraseña=pg_query("UPDATE usuario SET Contrasena = '".md5($usuario["Usuario"])."' where idUser='".$id."'")){
	echo "Contraseña actualizada para el usuario ".$usuario["Usuario"]." La contraseña es su mismo usuario.";
}

?>