<?php
include("header.php");
session_start();
$user=$_POST["username"];
$pwd=$_POST["password"];
$respuesta = new stdClass();
if($user=="" || $user==null || trim($user)=="" || $pwd=="" || $pwd==null || trim($pwd)==""){
    $respuesta->mensaje = 1;
    //echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
    //header("Location:?mod=login&msj=1");
}else{
    //$objUser=new CargoMania;
    //$log=array($user,$pwd);
    //$consultarUsuario=$objUser->consultar_usuario($log);
    //$c=$consultarUsuario->rowCount();
    $conuser=pg_query("select * from usuario where Usuario='".$user."' and Contrasena=md5('".$pwd."')");
    if(pg_num_rows($conuser)==1){ //Verificando que exista ese usuario y este activo
        //$usuario=$consultarUsuario->fetch(PDO::FETCH_OBJ);
        $usuario=pg_fetch_assoc($conuser);
        $_SESSION["autenticado"]="si";
        //session_start();
        $_SESSION["tipo"]=$usuario["tipousuario"];
        $_SESSION["nombre"]=$usuario["usuario"];
        //echo "Usuario encontrado";
        //$_SESSION["tipo"]=$usuario->TipoUsuario;
        $respuesta->mensaje = 3;
    }else{ //Si los datos ingresados son incorrectos mostrara el mensaje de alerta
        $respuesta->mensaje = 2;
        //header("Location:?mod=login&msj=2");
    }
}
echo json_encode($respuesta);
?>