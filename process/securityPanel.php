<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
error_reporting(E_PARSE);
//Validación de seción administrador iniciada
if (!$_SESSION['nombreAdmin'] == "") {

} else {
    header("Location: index.php");
    exit();
}
