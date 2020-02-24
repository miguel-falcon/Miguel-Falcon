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
$codeCateg= $_POST['categ-code'];

//Consulta categría por codigo
$cons=  ejecutarSQL::consultar("select * from categoria
where CodigoCat='$codeCateg'");
$totalcateg = mysql_num_rows($cons);

//condición de categoría encontrada
if($totalcateg>0){

//Consulta para eliminar categoría
    if(consultasSQL::DeleteSQL('categoria', "CodigoCat='".$codeCateg."'")){
        echo '<img src="assets/img/correcto.png" class="center-all-contens">
        <br><p class="lead text-center">Categoría eliminada éxitosamente</p>';
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
       <br><p class="lead text-center">Ha ocurrido un error.
       <br>Por favor intente nuevamente</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
    <br><p class="lead text-center">El código de la categoria no existe</p>';
}
