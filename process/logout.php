<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

//Cerrar secíon y redireccionar a la pagina principal
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
