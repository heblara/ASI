<?php
include("funciones/funciones.php");
require("recortar.php");
date_default_timezone_set('America/Chicago'); 
session_start();
include("seguridad.php");
ob_start();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Notificaci&oacute;n Electr&oacute;nica Judicial</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header-wrap">
	<div id="header-container">
		<div id="header">
			<?php include("paginas/header.php") ?>
		</div>
	</div>
</div>
<div style="background-color:#FFF;height:740px;">
    <div id="ie6-container-wrap">
    	<div id="container">
    		<div id="content" align="center">
            <?php 
    			include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
    		?>	
        </div>
      </div>
    </div>
</div>
<div id="footer-wrap">
	<div id="footer-container">
		<div id="footer">
          <?php include('paginas/footer.php'); ?>
        </div>
    </div>
 </div>
</body>
</html>
<?php
ob_end_flush();
?>