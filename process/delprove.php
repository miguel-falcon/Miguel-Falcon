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

include '../library/consulSQL.php';               //Conexión a la base de datos

sleep(5);
$nitProve= $_POST['nit-prove'];
//Consulta proveedor por RFC
$cons=  ejecutarSQL::consultar("select * from proveedor
where NITProveedor='$nitProve'");
$totalprove = mysql_num_rows($cons);

//condición de proveedor encontrada
if($totalprove>0){

//Consultas para eliminar proveedor
    if(consultasSQL::DeleteSQL('proveedor', "NITProveedor='".$nitProve."'")){
        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center">Proveedor eliminado éxitosamente</p>';
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
       <br><p class="lead text-center">Ha ocurrido un error.<br>Por favor
       intente nuevamente</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">El código de proveedor no existe</p>';
}
