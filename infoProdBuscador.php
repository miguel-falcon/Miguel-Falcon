<!--
"pagina descripción de productos por busqueda"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);


include './library/consulSQL.php';                 //Conexión a la base de datos
include './inc/link.php';              //Enlace de estilos y librerias incluidas
include './inc/navbar.php';                                //Brra de navegación
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Productos</title>                            <!-- Titulo de la pagina -->

</head>
<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

<!--Sección información de producto por busqueda-->
<section id="infoproduct">

<div class="container">
<div class="row">
<div class="page-header">
    <h1>Tienda <small class="tittles-pages-logo">Poductos </small> </h1>
</div>
<?php

//Consulta para mostrar el producto seleccionado
    $productoinfo=  ejecutarSQL::consultar(
    'select * from producto where NombreProd="'.$_GET['buscador'].'"');

//Ciclo para mostrar el producto y formulario de información del producto
    while($fila=mysql_fetch_array($productoinfo)){
      
//Condicion para mostrar el producto
    if(!$fila['NombreProd']==""){
    echo '

<div class="col-xs-12 col-sm-6">
    <h3 class="text-center">Información de producto</h3>
    <br><br>
    <h4><strong>Nombre: </strong>'.$fila['NombreProd'].'</h4><br>
    <h4><strong>presentacion: </strong>'.$fila['presentacion'].'</h4><br>
    <h4><strong>Marca: </strong>'.$fila['Marca'].'</h4><br>
    <h4><strong>Precio: </strong>$'.$fila['Precio'].'</h4>

    </div>

    <div class="col-xs-12 col-sm-6">
    <br><br><br>
    <img class="img-responsive" src="assets/img-products/'.$fila['Imagen'].'">
    </div>
    <br><br><br>
    <div class="col-xs-12 text-center">
    <a href="product.php" class="btn btn-lg btn-primary">
    <i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a>;
    <button value="'.$fila['CodigoProd'].'"
    class="btn btn-lg btn-success botonCarrito">
    <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito</button>

    </div>';
}else{
    echo '
    <h1>&nbsp;&nbsp;El producto'. $_GET['buscador'] .'no fue encontrado</h1>
    </td>
    </tr>
    <td></td>
    <td rowspan="2">
    <a  href="index.php" class="btn btn-lg btn-success ">Volver al inicio  </button>
    </td>
   <tr>
    </h1>
   </tr>
</table>
</div>';
}
}
?>
</div>
</div>
</section>

</body>
</html>
