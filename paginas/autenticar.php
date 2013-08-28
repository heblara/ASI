<?php
$user=$_POST["username"];
$pwd=$_POST["password"];
if($user=="" || $user==null || trim($user)=="" || $pwd=="" || $pwd==null || trim($pwd)==""){
    echo "Combinaci&oacute;n de usuario y contrase&ntilde;a incorrecta";
    header("Location:?mod=login&msj=1");
}else{
    $objUser=new CargoMania;
    $log=array($user,$pwd);
    $consultarUsuario=$objUser->consultar_usuario($log);
    $c=$consultarUsuario->rowCount();
    if($c>0){ //Verificando que exista ese usuario y este activo
        $usuario=$consultarUsuario->fetch(PDO::FETCH_OBJ);
        //session_start();
        $_SESSION["tipo"]=$usuario->TipoUsuario;
        $_SESSION["nombre"]=$usuario->Usuario;
        $_SESSION["autenticado"]="si";
        echo "Usuario encontrado";
            header("Location:?mod=home");

    }else{ //Si los datos ingresados son incorrectos mostrara el mensaje de alerta
        header("Location:?mod=login&msj=2");
    }
}
?>