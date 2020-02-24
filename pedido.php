<!--
"pagina descripción de productos por busqueda"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    session_start();

    include './library/consulSQL.php';             //Conexión a la base de datos
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
   <!--Enlaces a hojas de estilo-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans"
   rel="stylesheet">
   <link rel="stylesheet"
   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets/assets/css/styles.css">
   <link rel="stylesheet" type="text/css" href="assets/assets/css/demo.css">

<title>Pedido</title>                               <!-- Titulo de la pagina -->

<?php include './inc/link.php';        //Enlace de estilos y librerias incluidas
session_start();
?>

</head>
<!-- Estilo definido internamente para la dirección de envio -->
<style media="screen">
   #div{
    border-radius: 17px 17px 17px 17px;
    -moz-border-radius: 17px 17px 17px 17px;
    -webkit-border-radius: 17px 17px 17px 17px;
    border: 0px solid #000000;
}
</style>

<body id="container-page-index">                    <!-- Cuerpo de la pagina -->

<?php include './inc/navbar.php';                           //Brra de navegación
session_start();
?>

<!-- Sección de pedido -->
<section id="container-pedido">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-6">
    <br> <br>
    <img class="img-responsive center-all-contens" src="assets/img/tarjetas.png"
     style="background-size: cover;">
</div>

<div class="col-xs-12 col-sm-6">
<div id="form-compra">

<!-- Formulario de confirmar pedido -->
<form action="process/confirmcompra.php" method="post" role="form"
class="FormCatElec" data-form="save">
<?php

//Cnsulta para Mostrar datos de cliente
    $cliente=  ejecutarSQL::consultar(
    "select * from cliente where NIT='".$_SESSION['nombreUser']."'");

//Ciclo para Mostrar datos de cliente
    while($cli=mysql_fetch_array($cliente)){

//Condición para validar el usuario logueado y mostrar dirección
    if(!$_SESSION['nombreUser']=="" && !$_SESSION['claveUser']==""){
    echo '
<div class="creditCardForm" >
<div class="page-header" style=" background-color: #77dab7" id="div">
    <center>
    <h3 style="color: white">Confirmar Dirección de envio</h3></center>
<div class="form-group">
    <label id="color"><span class="glyphicon glyphicon-home 20px"">
    </span>&nbsp;Dirección de envio</label>
    <input type="text" class="form-control  " value="'.$cli["Direccion"].'"
    name="DirecEnvio">
</div>
</div>

<div class="payment">
<div class="form-group" id="card-number-field">
    <label for="cardNumber">Numero de tarjeta</label>
    <input type="text" class="form-control" id="cardNumber"
    placeholder="xxxx-xxxx-xxxx-xxxx">
</div>

<div class="form-group" id="expiration-date">
    <label>Fecha de expedición</label>
   <select>
    <option value="01">Enero</option>
    <option value="02">Febrero </option>
    <option value="03">Marzo</option>
    <option value="04">Abril</option>
    <option value="05">Mayo</option>
    <option value="06">Junio</option>
    <option value="07">Julio</option>
    <option value="08">Agosto</option>
    <option value="09">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviember</option>
    <option value="12">Diciember</option>
   </select>

   <select>
    <option value="16"> 2019</option>
    <option value="17"> 2018</option>
    <option value="18"> 2019</option>
    <option value="19"> 2020</option>
    <option value="20"> 2021</option>
    <option value="21"> 2022</option>
    <option value="22"> 2023</option>
    </select>
    </div>

<div class="form-group CVV">
    <label for="cvv">CVV</label>
    <input type="text" class="form-control" id="cvv" placeholder="xxx" >
</div>

<div class="form-group" id="credit_cards">
    <img src="assets/img/paypal.png" class=" id="visa">

<form action="https://www.paypal.com/cgi-bin/webscr" target="_top">

    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="WK28ZRC3PE4MG">
    <input type="image"
    src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif"
    border="0" name="submit" alt="PayPal, la forma rápida y segura de pagar .">
    <img alt="" border="0"
    src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif">
</form>
</div>

<div class="form-group" id="pay-now">
    <input type="hidden" name="clien-name" value="'.$_SESSION['nombreUser'].'">
    <input type="hidden" name="clien-pass" value="'.$_SESSION['claveUser'].'">
    <input type="hidden"  name="clien-number" value="log">
    <button type="submit" class="btn btn-info" id="confirm-purchase">Confirmar
    </button>
</div>

</div>
</div>';

}else{
    echo '
    <h3 class="text-center">¿Confirmar el pedido?</h3>
    <p>
    Para confirmar tu compra debes haber iniciar sesión o introducir tu
    nombre de usuario y contraseña con la cual te registraste en
    <span class="tittles-pages-logo">Farmaceutica San Gabriel </span>.
    </p>
    <br>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-user"></i></div>
    <input class="form-control all-elements-tooltip" type="text"
    placeholder="Ingrese su nombre" required name="clien-name"
    data-toggle="tooltip" data-placement="top" title="Ingrese su nombre"
    pattern="[a-zA-Z]{1,9}" maxlength="9">
</div>
</div>

    <br>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-lock"></i></div>
    <input class="form-control all-elements-tooltip" type="password"
    placeholder="Introdusca su contraseña" required name="clien-pass"
    data-toggle="tooltip" data-placement="top" title="Introdusca su contraseña">
</div>
</div>
    <input type="hidden"  name="clien-number" value="notlog">
    <br>';
}
}
?>

</form>
</div>

</div>
</div>
</div>
</section>

</body>
</html>
