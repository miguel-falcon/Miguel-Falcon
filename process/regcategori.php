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
$nameCateg= $_POST['categ-name'];
$descripCateg= $_POST['categ-descrip'];

//validación para ver la categoría
    if(!$codeCateg=="" && !$nameCateg=="" && !$descripCateg==""){

//Consulta para ver la categoría
    $verificar=  ejecutarSQL::consultar("select * from categoria
    where CodigoCat='".$codeCateg."'");
    $verificaltotal = mysql_num_rows($verificar);
//validación registrar nueva categoría
    if($verificaltotal<=0){

//Consulta pra registrar categoría
    if(consultasSQL::InsertSQL("categoria", "CodigoCat, Nombre,
    Descripcion", "'$codeCateg','$nameCateg','$descripCateg'")){
    echo '<img src="assets/img/correcto.png" class="center-all-contens">
    <br><p class="lead text-center">Categoría añadida éxitosamente</p>';
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">Ha ocurrido un error.<br>Por favor intente
    nuevamente</p>';
}
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">El código que ha ingresado ya existe.<br>Por
    favor ingrese otro código</p>';
}
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
