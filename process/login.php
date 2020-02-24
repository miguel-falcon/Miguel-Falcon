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


    include '../library/consulSQL.php';            //Conexión a la base de datos

    sleep(2);
// variables con valores asignados a partor del archivo inc/navbar.php
    $nombre=$_POST['nombre-login'];
    $clave=md5($_POST['clave-login']);
    $radio=$_POST['optionsRadios'];

    $verUser=ejecutarSQL::consultar("select * from cliente
    where NIT='$nombre' and Clave='$clave'");
    $verAdmin=ejecutarSQL::consultar("select * from administrador
    where Nombre='$nombre' and Clave='$clave'");

    $AdminC=mysql_num_rows($verAdmin);
    $UserC=mysql_num_rows($verUser);

    if($AdminC>0){ //Condicion para inicar como administrador

    $_SESSION['nombreAdmin']=$nombre;
    $_SESSION['claveAdmin']=$clave;
    echo '<script> location.href="index.php"; </script>';

} else{

    if($UserC>0){ //Condicion para inicar como usuario

    $UserC=mysql_num_rows($verUser);

    $_SESSION['nombreUser']=$nombre;
    $_SESSION['claveUser']=$clave;
    echo '<script> location.href="index.php"; </script>';

}else{
   echo '<img src="assets/img/error.png" class="center-all-contens">
   <br>Error nombre o contraseña invalido';
}
}
