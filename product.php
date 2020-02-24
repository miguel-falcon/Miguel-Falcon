<!--
"pagina de catalago de productos"
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

 <!-- Codigo javascript para crear efecto zoom a las imagenes -->
<script>
    $(document).ready(function(){
    $('.zoom').hover(function() {
    $(this).addClass('transition');
},
    function() {
    $(this).removeClass('transition');
});
});
</script>

</head>
<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

 <!-- Sección catalago de productos -->
<section id="store">

<div class="container">
<div class="page-header">
    <h1>Tienda <small class="tittles-pages-logo">Farmaceutica San Gabriel
    </small> </h1>
</div>

<div class="row">
<div class="col-xs-12">

<!-- Opciónes para motrar los productos por categoría o general -->
   <ul id="store-links" class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#all-product" role="tab" data-toggle="tab"
    aria-controls="all-product" aria-expanded="false">Todos los productos</a>
    </li>
    <li role="presentation" class="dropdown active">
    <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"
    aria-controls="myTabDrop1-contents" aria-expanded="false">Categorías
    <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1"
    id="myTabDrop1-contents">

<!--Lista categorias-->
<?php
    $categorias=  ejecutarSQL::consultar("select * from categoria");
    while($cate=mysql_fetch_array($categorias)){
    echo '
    <li>
    <a href="#'.$cate['CodigoCat'].'" tabindex="-1" role="tab"
    id="'.$cate['CodigoCat'].'-tab" data-toggle="tab"
    aria-controls="'.$cate['CodigoCat'].'" aria-expanded="false">
    '.$cate['Nombre'].'
    </a>
    </li>';
}
?>
<!--Fin lista categorias-->
   </ul>
    </li>
  </ul>
<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade" id="all-product"
aria-labelledby="all-product-tab">

<div class="row">
<?php

//Consulta para cargar los productos
    $consulta=  ejecutarSQL::consultar("select * from producto
    where Stock > 0");
    $totalproductos = mysql_num_rows($consulta);

//Condición para mostar los productos si aun hay en existencia
    if($totalproductos>0){

//Ciclo para mostrar los productos
    while($fila=mysql_fetch_array($consulta)){
    echo '
<div class="col-xs-12 col-sm-4 col-md-4">
<div class="thumbnail">
    <img  src="assets/img-products/'.$fila['Imagen'].'"  class="zoom">
<div class="caption">
    <h3>'.$fila['Marca'].'</h3>
    <p>'.$fila['NombreProd'].'</p>
    <p>$'.$fila['Precio'].'</p>
    <p class="text-center">
    <a href="infoProd.php?CodigoProd='.$fila['CodigoProd'].'"
    class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>

    </p>

</div>
</div>
</div>';
}
}else{
    echo '<h2>No hay productos en esta categoria</h2>';
}
?>
</div>
</div>
<!-- Fin del contenedor de todos los productos -->

<!-- Contenedores de categorias -->
<?php

//Consulta para cargar las categorías
    $consultar_categorias= ejecutarSQL::consultar(
      "select * from categoria");

//Ciclo para cargar las categorías
    while($categ=mysql_fetch_array($consultar_categorias)){
    echo '<div role="tabpanel" class="tab-pane fade active in"
    id="'.$categ['CodigoCat'].'" aria-labelledby="'.$categ['CodigoCat'].'
    -tab">';

//Consulta para cargar los productos  por categoría
    $consultar_productos= ejecutarSQL::consultar(
    "select * from producto where CodigoCat='".$categ['CodigoCat']."'
    and Stock > 0");
    $totalprod = mysql_num_rows($consultar_productos);

//condicion para mostar los productos siempre y cuando allá disponibles
    if($totalprod>0){

//Ciclo para cargar los productos
    while($prod=mysql_fetch_array($consultar_productos)){
    echo '
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="thumbnail">
    <img src="assets/img-products/'.$prod['Imagen'].'">
<div class="caption">
    <h3>'.$prod['Marca'].'</h3>
    <p>'.$prod['NombreProd'].'</p>
    <p>$'.$prod['Precio'].'</p>
    <p class="text-center">
    <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'"
    class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
    </p>

</div>
</div>
</div>';
}
} else {
    echo '<h2>No hay productos en esta categoría</h2>';
}
    echo '</div>';
}
?>
<!-- Fin contenedores de categorias -->
</div>
</div>
</div>
</div>
</section>

<?php include './inc/footer.php';                               //Redes sociales
?>
<script>
    $(document).ready(function() {
    $('#store-links a:first').tab('show');
    });
</script>
</body>
</html>
