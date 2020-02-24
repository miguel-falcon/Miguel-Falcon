<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

include '../library/consulSQL.php';               //Conección a la base de datos

sleep(3);

//Asigancion de valores a las variables con datos ingresados
$nitCliente= $_POST['clien-nit'];
$nameCliente= $_POST['clien-name'];
$passCliente= md5($_POST['clien-pass']);
$dirCliente= $_POST['clien-dir'];
$phoneCliente= $_POST['clien-phone'];
$emailCliente= $_POST['clien-email'];

//verificación de que no alla campos vacios en los cuadros de texto
    if(!$nitCliente=="" && !$nameCliente=="" &&  !$dirCliente=="" &&
    !$phoneCliente=="" && !$emailCliente=="" && !$passCliente==""){

//Consulta para ver si existe un cliente registrado
    $verificar=  ejecutarSQL::consultar("select * from cliente
    where NIT='".$nitCliente."'");
    $verificaltotal = mysql_num_rows($verificar);

    if($verificaltotal<=0){
?>
<form action="process/login.php" method="post" role="form"
style="margin: 20px;" class="FormCatElec" data-form="login">

</form>

<?php
//Consulta para ingresar nuevo cliente
    if(consultasSQL::InsertSQL("cliente","NIT, NombreCompleto,
    Clave,Direccion, Telefono, Email", "'$nitCliente','$nameCliente',
    '$passCliente','$dirCliente', '$phoneCliente','$emailCliente'")){
    echo '<img src="assets/img/ok.png" ><br>El registro se completo con éxito';

    $nombre=$nitCliente;
    $clave=$passCliente;

    $verUser=ejecutarSQL::consultar("select * from cliente where NIT='$nombre' and Clave='$clave'");
    $UserC=mysql_num_rows($verUser);

    if($UserC>0){ //Condicion para inicar como usuario

    $UserC=mysql_num_rows($verUser);

    $_SESSION['nombreUser']=$nombre;
    $_SESSION['claveUser']=$clave;
    echo '<script> location.href="index.php"; </script>';

}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente';
}
}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nmbre de usuario que ha ingresado ya esta registrado.<br>Por favor ingrese otro nombre de usuario';
}
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error los campos no deben de estar vacíos';
}
}
