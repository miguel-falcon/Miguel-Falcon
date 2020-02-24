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
    $nameAd= $_POST['name-admin'];
//Consulta administrador por nombre
    $consA=  ejecutarSQL::consultar(
    "select * from administrador where Nombre='$nameAd'");
    $totalA = mysql_num_rows($consA);

//condición de administrador encontrado
    if($totalA>0){

//Consulta para eliminar administrador
    if(consultasSQL::DeleteSQL('administrador', "Nombre='".$nameAd."'")){
        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center">Administrador eliminado éxitosamente
        </p>';
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
       <br><p class="lead text-center">Ha ocurrido un error.<br>Por favor
       intente nuevamente</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
    <br> <p class="lead text-center">El nombre del administrador no existe</p>';
}
