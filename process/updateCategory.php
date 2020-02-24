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

//Asganacion de valores a las variables
$codeOldCatUp=$_POST['categ-code-old'];
$codeCatUp=$_POST['categ-code'];
$nameCatUp=$_POST['categ-name'];
$descCatUp=$_POST['categ-descrip'];

//Consulta para modificar los campos de la categoría
if(consultasSQL::UpdateSQL("categoria", "CodigoCat='$codeCatUp',
Nombre='$nameCatUp',Descripcion='$descCatUp'", "CodigoCat='$codeOldCatUp'")){
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
    <p class="text-center">
        Recargando<br>
        en 5 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
      },5000);
    </script>
 ';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 5 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
      },5000);
    </script>
 ';
}
