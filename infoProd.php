<!--
"pagina descripción de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
 <?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

include './library/consulSQL.php';                 //Conexión a la base de datos
include './inc/link.php';              //Enlace de estilos y librerias incluidas
include './inc/navbar.php';                                 //Brra de navegación
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Productos</title>                            <!-- Titulo de la pagina -->
</head>
<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

<!--Sección información de producto-->
<section id="infoproduct">
<div class="container">
<div class="row">

<div class="page-header">
    <h1>Tienda
    <small class="tittles-pages-logo">Farmaceutica San Gabriel </small> </h1>
    <a href="product.php" class="btn btn-lg btn-primary">
    <i class="fa fa-mail-reply"> </i>&nbsp;Regresar a la tienda </a>
</div>

<?php

//Consulta para mostrar el producto seleccionado
    $CodigoProducto=$_GET['CodigoProd'];
    $productoinfo=  ejecutarSQL::consultar(
    "select * from producto where CodigoProd='".$CodigoProducto."'");

//Ciclo para mostrar el producto y formulario de información del producto
    while($fila=mysql_fetch_array($productoinfo)){
    echo'
<div class="col-xs-12 col-sm-6" id="divColor">

    <h3 class="text-center" style="color: white; font-size: 40px">
    Información de producto</h3>
    <h4><strong>Nombre: </strong>'.$fila['NombreProd'].'</h4><br>
    <h4><strong>presentacion: </strong>'.$fila['presentacion'].'</h4><br>
    <h4><strong>Marca: </strong>'.$fila['Marca'].'</h4><br>
    <h4><strong>Precio: </strong>$'.$fila['Precio'].'</h4> <br>
    <h4><strong>Unidades disponibles: </strong>'.$fila['Stock'].'</h4>

</div>

<div class="col-xs-12 col-sm-6">

    <img class="img-responsive" src="assets/img-products/'.$fila['Imagen'].'">
<div class="form-group col-md-3">
    <span class="form-group" values="cantidad">cantidad</span>
    <input min="1" max="100" class="form-control" type="number"
    value="1" name="cantidad" >';
    if(!$_SESSION['nombreUser']==""){
    echo ' <button value="'.$fila['CodigoProd'].'"
    class="btn btn-lg btn-success botonCarrito">
    <i class="fa fa-shopping-cart"> </i> &nbsp;&nbsp; Añadir al carrito
    </button> </div>';
}else {
    echo '
    <a class="  all-elements-tooltip" data-toggle="tooltip"
    data-placement="bottom"
    title="se requiere de inicio seción o registrarse" readOnly>
    <button value="'.$fila['CodigoProd'].'"
    class="btn btn-lg btn-success botonCarrito" disabled="disabled">
    <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito </button>
    </a> </div>';
}
    echo '
</div>';
}
?>
</div>
</div>
</section>

</body>
</html>
