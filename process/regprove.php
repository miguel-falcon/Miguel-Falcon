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

//Asignación de valores a las variables
$nitProve= $_POST['prove-nit'];
$nameProve= $_POST['prove-name'];
$dirProve= $_POST['prove-dir'];
$telProve= $_POST['prove-tel'];
$webProve= $_POST['prove-web'];

//Validacion para ver si hay campos vacios
if(!$nitProve=="" && !$nameProve=="" && !$dirProve=="" && !$telProve==""
&& !$webProve==""){

//Consulta de proveedores por RFC
    $verificar=  ejecutarSQL::consultar("select * from proveedor where
    NITProveedor='".$nitProve."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){

  //Consulta para agregar nuevo proveedor
    if(consultasSQL::InsertSQL("proveedor", "NITProveedor, NombreProveedor,
    Direccion, Telefono, PaginaWeb", "'$nitProve','$nameProve','$dirProve',
    '$telProve','$webProve'")){
    echo '<img src="assets/img/correcto.png" class="center-all-contens">
    <br><p class="lead text-center">Proveedor añadido éxitosamente</p>';
}else{
    echo '<img src="assets/img/incorrecto.png"
    class="center-all-contens"><br><p class="lead text-center">
    Ha ocurrido un error.<br>Por favor intente nuevamente</p>';
}
}else{
   echo '<img src="assets/img/incorrecto.png" class="center-all-contens">
    <br><p class="lead text-center">El número de NIT que ha ingresado ya
    existe.<br>Por favor ingrese otro número de NIT</p>';
}
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br>
    <p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
