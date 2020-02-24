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

//Asganación de valores a las variables
$NIT=$_POST['actualizar-usuario'];
$NOMBREC=$_POST['actualizar-nombre'];
$DIRECCION=$_POST['actualzar-direccion'];
$TELEFONO=$_POST['actualizar-telefono'];
$EMAIL=$_POST['actualizar-email'];

//Consulta para modificar los campos del cliente
if(consultasSQL::UpdateSQL("cliente", "NIT='$NIT',NombreCompleto='$NOMBREC',
clave=:clave,Direccion='$DIRECCION',Telefono='$TELEFONO',Email='$EMAIL'")){
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Actualizado</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}
