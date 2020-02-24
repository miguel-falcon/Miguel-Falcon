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
$nameAdmin= $_POST['admin-name'];
$passAdmin= md5($_POST['admin-pass']);

//validación para ver si el administrador esta logueado
    if(!$nameAdmin=="" && !$passAdmin==""){

//consulta a la tabla administrador con el nombre
    $verificar=  ejecutarSQL::consultar("select * from administrador
    where Nombre='".$nameAdmin."'");
    $verificaltotal = mysql_num_rows($verificar);

//validación para registrar nuevo administrador
    if($verificaltotal<=0){

//consulta para registrar nuevo administrador
    if(consultasSQL::InsertSQL("administrador", "Nombre, Clave",
    "'$nameAdmin','$passAdmin'")){
    echo '<img src="assets/img/correcto.png" class="center-all-contens">
    <br><p class="lead text-center">
    Administrador añadido éxitosamente</p>';
}else{
     echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
     <br><p class="lead text-center">Ha ocurrido un error.<br>
     Por favor intente nuevamente</p>';
}
}else{
     echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
     <br><p class="lead text-center">El nombre que ha ingresado ya existe.
     <br>Por favor ingrese otro nombre</p>';
}
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
    <br><p class="lead text-center">
    Error los campos no deben de estar vacíos</p>';
}
