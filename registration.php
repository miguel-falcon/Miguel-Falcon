<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
 <?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

     include './inc/link.php';         //Enlace de estilos y librerias incluidas
     include './inc/navbar.php';                            //Brra de navegación

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro</title>                             <!-- Titulo de la pagina -->

</head>
<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

<!-- Sección para registrar clientes -->
<section id="form-registration">

<div class="container">
<div class="row">
<div class="page-header">

<!-- tabla para registrar la información del cliente -->
<table>
   <tr>
    <td> <p> <i class="fa fa-users fa-5x " > </i> </p> </td>
    <td> <h1>&nbsp;Registro de cliente </h1>
    <h6>Registrate y realiza tus pedidos desde donde quiera que estes.</h6>
   </td>
  <td>

<div class="col-xs-2 col-sm-5 text-center">
</div>

<div class="col-xs-12 col-sm-12 ">

<div id="container-form">
    <p style="color:#fff" class="text-center lead">
    Debera de llenar todos los campos para registrarse</p>

<!-- Formulrio para registrar cliente -->
  <form class="form-horizontal FormCatElec" action="process/regclien.php"
  role="form" method="post" data-form="save">

<div class="form-group">                        <!-- Campo usuario de cliente-->
<div class="input-group">
<div class="input-group-addon">
      <i class="fa fa-user"></i></div>
      <input class="form-control all-elements-tooltip" name="clien-nit"
      type="text" placeholder="Ingrese nombre de usuario"
      title="Defina un usuario para iniciar sesión"
      required data-toggle="tooltip" data-placement="top">
</div>
</div>

<div class="form-group">                     <!-- Campo contraseña de ciente -->
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-lock"></i></div>
    <input class="form-control all-elements-tooltip" type="password"
    placeholder="Introdusca una contraseña" required name="clien-pass"
    data-toggle="tooltip" data-placement="top"
    title="Defina una contraseña para iniciar sesión">
</div>
</div>

<div class="form-group">                        <!-- Campo nombre de cliente -->
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-user"></i></div>
    <input class="form-control all-elements-tooltip" type="text"
    placeholder="Ingrese sus nombres" required name="clien-name"
    data-toggle="tooltip" data-placement="top"
    title="Ingrese su nombre. Máximo 50 caracteres (solamente letras)"
    maxlength="50">
</div>
</div>

<div class="form-group">                     <!-- Campo dirección de cliente -->
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-home"></i></div>
    <input class="form-control all-elements-tooltip" type="text"
    placeholder="Ingrese su dirección" required name="clien-dir"
    data-toggle="tooltip" data-placement="top"
    title="Ingrese la direción en donde recibira sus pedidos "
    maxlength="100">
</div>
</div>

<div class="form-group">                      <!-- Campo teléfono de cliente -->
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-mobile"></i></div>
    <input class="form-control all-elements-tooltip" type="tel"
    placeholder="Ingrese su número telefónico" required name="clien-phone"
    maxlength="11" pattern="[0-9]{8,11}" data-toggle="tooltip"
    data-placement="top" title="Ingrese su número telefónico.
    Mínimo 8 digitos máximo 11">
</div>
</div>

<div class="form-group">                        <!-- Campo correo de usuario -->
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-at"></i></div>
    <input class="form-control all-elements-tooltip" type="email"
    placeholder="Ingrese su Email" required name="clien-email"
    data-toggle="tooltip" data-placement="top"
    title="Ingrese la dirección de su Email" maxlength="50">
</div>
</div>

<div class="col-xs-12 col-sm-12">
    <p>

<!-- Botón registrar -->
    <button type="submit" class="btn btn-success btn-block">
      <i class="fa fa-pencil"></i>&nbsp; Registrarse
    </button> </p>

<div class="ResForm" style="width: 100%; color: #fff;
text-align: center; margin: 0;">
</div>
</div>
</form>
</div>
</div>
</tr>
</table>
</div>
</div>
</section>
<?php include './inc/footer.php';                               //Redes sociales
?>
</body>
</html>
