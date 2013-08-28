<?php
include("header.php");
session_start();
$user=$_POST["username"];
$pwd=$_POST["password"];
$respuesta = new stdClass();
if($user=="" || $user==null || trim($user)=="" || $pwd=="" || $pwd==null || trim($pwd)==""){
    $respuesta->mensaje = 1;
}else{
    $objUser=new CargoMania;
    $log=array($user,$pwd);
    $consultarUsuario=$objUser->consultar_usuario($log);
    $c=$consultarUsuario->rowCount();
    if($c==1){ //Verificando que exista ese usuario y este activo
        $usuario=$consultarUsuario->fetch(PDO::FETCH_OBJ);
        $respuesta->mensaje = 3;
        $_SESSION["tipo"]=$usuario->TipoUsuario;
        $_SESSION["nombre"]=$usuario->Usuario;        
        $_SESSION["autenticado"]="si";
    }else{ //Si los datos ingresados son incorrectos mostrara el mensaje de alerta
        $respuesta->mensaje = 2;
    }
}
echo json_encode($respuesta);
?>