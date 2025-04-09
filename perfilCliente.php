<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->

<!DOCTYPE html>
<html lang="es">
<head>
<title>Inicio</title>                               <!-- Titulo de la pagina -->
<?php


 //Comentario de prueba 2
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    session_start();
    include './inc/link.php';          //Enlace de estilos y librerias incluidas
    include './library/consulSQL.php';             //Conexión a la base de datos
    include './inc/navbar.php';                             //Brra de navegación
 ?>
</head>

<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

<!--Sección información del cliente-->
<section id="infoproduct">

<div class="container">
<div class="row">
<div class="page-header ">
<div> TEST update 2</div>
    <h1> Mi perfil  <small class="tittles-pages-logo">Bienvenido.</small></h1>
</div>
<?php
//Consulta pra obtener los datos del cliente
    $cliente=  ejecutarSQL::consultar(
    "select * from cliente where NIT='".$_SESSION['nombreUser']."'");

//Ciclo pra obtener los datos del cliente y tabla contenedora de la informacióngit 
    while($cli=mysql_fetch_array($cliente)){
    echo "
    <center>
<table>
   <tr>
    <td>
<div class='col-xs-12 col-sm-12 text-center'>
<div id='container-form'>

    <p style='color:#000;' class='text-center lead'>
    <i class='fa fa-user fa-3x'>&nbsp; </i>
    Si deceas editar tus información preciona el boton ACTUALIZAR DATOS</p>

<form class='form-horizontal FormCatElec' action='process/delCient.php'
role='form' method='post' data-form='save'>
    <label id='color'><span class='glyphicon glyphicon-user'></span>
    &nbsp;Nombre de usuaio</label>
    <input class='form-control' type='text' value='".$cli['NIT']."' readonly>

    <label id='color'><span class='glyphicon glyphicon-user'></span>
    &nbsp;Nombre completo</label>
    <input type='text' class='form-control' type='text'
    value='".$cli['NombreCompleto']."' readonly>

    <label id='color'><span class='glyphicon glyphicon-home'></span>
    &nbsp;Domicilio</label>
    <input class='form-control' type='text'
    value='".$cli['Direccion']."' readonly>

    <label id='color'><span class='glyphicon glyphicon-envelope'></span>
    &nbsp;Correo electronico</label>
    <input class='form-control' type='text'
    value='".$cli['Email']."' readonly>

    <label id='color'><span class='glyphicon glyphicon-phone'></span>
    &nbsp;Teléfono</label>
    <input class='form-control' type='text'
    value='".$cli['Telefono']."' readonly> </div>";
}
?>
</div>

   </tr>
</table>

</div>
</div>

</body>
</html>
