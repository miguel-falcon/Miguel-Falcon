<!--
"Index (página principal)"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->

<!DOCTYPE html>

<html lang="es">
<head>
    <title>Inicio</title>                           <!-- Titulo de la pagina -->
    <?php include './inc/link.php';    //Enlace de estilos y librerias incluidas
          include './inc/navbar.php';                       //Brra de navegación
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); ?>

</head>
<style>
.carousel, .carousel-inner > .item > img {
 height: 400px;
 width: 900px;
}
.carousel-indicators li {
  display: inline-block;
  width: 20px;
  height: 20px;
  margin: 10px;
  text-indent: 0;
  cursor: pointer;
  border: none;
  border-radius: 50%;
  background-color: #FFFFFF;
  box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.5);
}
.carousel-indicators .active {
  width:10px;
  height: 10px;
  margin: 10px;
  background-color: #ffff99;
}
.resp-iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>
<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
}, function() {
        $(this).removeClass('transition');
    });
});
</script>
<body id="container-page-index">                    <!-- Cuerpo de la pagina -->


<div class="" id="jumbotron-index">
<table>
   <tr>
    <td> <br> <img src="assets\img\64.png" ></td>
    <td> <h1> <span class="tittles-pages-logo">
    Farmaceutica San Gabriel </span> </h1>
    <p>
    Bienvenido a nuestra tienda en línea, donde encontraras productos de
    calidad al mejor precio.</td>
    </p>
   </tr>
</table>
</div>

<section id="new-prod-index">
<div class="container-fluid">
<table>
   <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;
<div class="col-sm-2">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Indicadores -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Envoltorio para diapositivas -->
<div class="carousel-inner">
<div class="item active">
    <img src="productos/1.jpg" alt="info1" >
        </div>

<div class="item">
    <img src="productos/2.jpg" alt="info2" >
</div>

<div class="item">
    <img src="productos/3.jpg" alt="info3">
</div>
</div>

<!-- Control de desplazamiento izquierdo y derecho -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Atras</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
    </a>
</div>
</div>

    </td>
    <td>
    <a href="localhost/tiendaenlineafarmaceuticasangabriel/infoProd.php?
    CodigoProd=6"> <img src="productos/1.png" style="size: 10%" class="zoom">
    </a> <br> <br>
    <a href="localhost/tiendaenlineafarmaceuticasangabriel/infoProd.php?
    CodigoProd=2"> <img src="productos/2.png" class="zoom" ></a>
    </td>
   </tr>
</table>

</div>

</section>

<section id="reg-info-index">

<div class="container">

<?php
//Validaciòn para no mostrar la opcion de registro si ya esta logueado
if ($_SESSION['nombreUser']=="") {
  echo '

<div class="row">
<div class="col-xs-12 col-sm-6 text-center">
    <article style="margin-top:20%;">
    <p><i class="fa fa-users fa-4x"></i></p>
    <h3>Registrate</h3>
    <p>Registrese en nuestra pagina para poder realizar pedidos a domicilio.</p>
    <p><a href="registration.php" class="btn btn-info btn-block">Registrarse</a>
    </p>
    </article>
</div>

<div class="col-xs-12 col-sm-6">
    <img src="assets/img/regi.png"  class="img-responsive">
</div>
</div>';
}
?>
</div>
</div>

</section>

<!--Secciòn de mapara de la sucursal-->
<section id="distribuidores-index">
<div class="container">
<div class="col-xs-12 col-sm-10">
    <h1>VISITANOS:
    <small style="color: white;">
    Tel: 33-18-54-22-64 -- 33-30-02-15-15 </small> </h1>
    <h3>Av. Salome Piña 691, Fovissste Miravalle,
    45590 San Pedro  Tlaquepaque, Jal.</h3>
</div>

<div class="col-xs-12">
<div class="page-header">
    <img src="assets/img/ubicacion.png" height=""  class="img-responsive zoom">

<div class="resp-container">
    <iframe class="resp-iframe"
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.469976061615!2d-103.3528972857837!3d20.60969178622691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b284f9c1ab19%3A0x528250d35b088cb3!2sAv.+Salome+Pi%C3%B1a+691%2C+Fovissste+Miravalle%2C+45590+San+Pedro+Tlaquepaque%2C+Jal.!5e0!3m2!1ses-419!2smx!4v1564720253803!5m2!1ses-419!2smx"
frameborder="10" style="border:0" >
</iframe>

</div>
</div>
</div>
</div>
</div>

</section>

<?php
//Comentario de prueba 

include './inc/footer.php'; ?>
</body>
</html>
