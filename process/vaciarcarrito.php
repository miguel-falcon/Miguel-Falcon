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
//Vaciar carrito de productos
unset($_SESSION['producto']);
unset($_SESSION['contador']);
unset($_SESSION['sumaTotal']);
?>
<script>
    window.location = "../index.php";
</script>
