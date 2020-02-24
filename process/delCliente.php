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

 sleep(4);

 $nit= $_POST['nombreUser'];

 //Consulta cliente por usuario
 $cons=  ejecutarSQL::consultar(
  "select * from cliente where NIT='$nit'");
 $total = mysql_num_rows($cons);
 $tmp=  mysql_fetch_array($cons);
 $imagen=$tmp['Imagen'];

 //condición de cliente encontrada
 if($total>0){

//Consulta para eliminar categoría
    if(consultasSQL::DeleteSQL('cliente', "NIT='".$nit."'")){

        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center">Tu cuenta se a dado de baja del
        sistema gracias por visitarnos.</p>';
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
        <br><p class="lead text-center">Ha ocurrido un error.<br>Por favor
        intente nuevamente</p>';
    }
 }else{
     echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
     <br><p class="lead text-center">El código del producto no existe</p>';
 }
