<?php
define('MODULO_DEFECTO','login');
define('LAYOUT_DEFECTO','inicio.php');//Administrador
define('LAYOUT_LOGIN','login.php');//Administrador
define('LAYOUT_ADMINISTRADOR','administrador.php');
define('LAYOUT_ABOGADO','abogado.php');
define('LAYOUT_NOTIFICADOR','notificador.php');
define('LAYOUT_INICIO','inicio.php');//Para cualquier tipo de usuario
define('MODULO_PATH',realpath('paginas'));
define('LAYOUT_PATH',realpath('plantillas'));
//ADMINISTRADOR DE CUENTAS ELECTRÓNICAS

//Archivos generales
$conf['home']=array(
'archivo'=>'home.php',
'layout'=>LAYOUT_INICIO
);
$conf['404']=array(
'archivo'=>'404.php',
'layout'=>LAYOUT_INICIO
);
$conf['login']=array(
'archivo'=>'login.php',
'layout'=>LAYOUT_INICIO
);
$conf['autenticar']=array(
'archivo'=>'autenticar.php',
'layout'=>LAYOUT_INICIO
);
$conf['logout']=array(
'archivo'=>'logout.php',
'layout'=>LAYOUT_INICIO
);
$conf['principalAdmin']=array(
'archivo'=>'principalAdmin.php',
'layout'=>LAYOUT_ADMINISTRADOR
);
$conf['changePwd']=array(
'archivo'=>'frmCambiarContra.php',
'layout'=>LAYOUT_ADMINISTRADOR
);
$conf['cambiarPwd']=array(
'archivo'=>'procesoFrmCambiarContra.php',
'layout'=>LAYOUT_ADMINISTRADOR
);
$conf['resetPwdUser']=array(
'archivo'=>'pwdRecovery.php',
'layout'=>LAYOUT_ADMINISTRADOR
);

?>