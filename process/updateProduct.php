<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

include '../library/consulSQL.php';                //Conexión a la base de datos

sleep(5);

//Asganación de valores a las variables
$codeOldProdUp=$_POST['code-old-prod'];
$codeProdUp=$_POST['code-prod'];
$nameProdUp=$_POST['prod-name'];
$catProdUp=$_POST['prod-category'];
$priceProdUp=$_POST['price-prod'];
$presentProdUp=$_POST['presentacion-prod'];
$marcaProdUp=$_POST['marca-prod'];
$stockProdUp=$_POST['stock-prod'];
$proveProdUp=$_POST['prod-Prove'];

//Consulta para modificar los campos del producto
if(consultasSQL::UpdateSQL("producto", "CodigoProd='$codeProdUp',
NombreProd='$nameProdUp',CodigoCat='$catProdUp',Precio='$priceProdUp',
presentacion='$presentProdUp',Marca='$marcaProdUp',Stock='$stockProdUp',
NITProveedor='$proveProdUp'", "CodigoProd='$codeOldProdUp'")){
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
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
