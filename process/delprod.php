<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

 include '../library/consulSQL.php';               //Conexión a la base de datos

 sleep(4);

 $codeProd= $_POST['prod-code'];

//Consulta producto por codigo de producto
 $cons=  ejecutarSQL::consultar("select * from producto
 where CodigoProd='$codeProd'");
 $totalproductos = mysql_num_rows($cons);
 $tmp=  mysql_fetch_array($cons);
 $imagen=$tmp['Imagen'];

//condición de producto encontrada
 if($totalproductos>0){

//Consultas para eliminar venta
    if(consultasSQL::procedureD($codeProd)){
        $carpeta='../assets/img-products/';
        $directorio=$carpeta.$imagen;
        chmod($directorio, 0777);
        unlink($directorio);
        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center">El producto se elimino de la
        tienda con éxito</p>';
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
        <br><p class="lead text-center">Ha ocurrido un error.<br>Por favor
        intente nuevamente</p>';
    }
 }else{
     echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
     <br><p class="lead text-center">El código del producto no existe</p>';
 }
