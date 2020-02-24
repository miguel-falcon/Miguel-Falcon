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

include '../library/consulSQL.php';                //Conexión a la base de datos

sleep(5);
$NumPedidoDel= $_POST['num-pedido'];

//Consulta venta por codigo de venta
$consP=  ejecutarSQL::consultar("select * from venta
where NumPedido='$NumPedidoDel'");
$totalP= mysql_num_rows($consP);

 //condición de venta encontrada
if($totalP>0){

//Consultas para eliminar venta
    if(consultasSQL::DeleteSQL('venta', "NumPedido='".$NumPedidoDel."'")){
        consultasSQL::DeleteSQL("detalle", "NumPedido='".$NumPedidoDel."'");
        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center"></p>  ';
 echo '<script> location.href="../Mispedidos.php"; </script>';
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
       <br><p class="lead text-center">Ha ocurrido un error.
       <br>Por favor intente nuevamente</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">El pedido no existe</p>';
}
