<!--
"Administracion generar de la intranet"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->

<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

    include './library/consulSQL.php';             //Conexión a la base de datos
    include './process/securityPanel.php';        //Panel de seguridad de seción
    include './inc/link.php';          //Enlace de estilos y librerias incluidas
    include './inc/navbar.php';                             //Brra de navegación
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Administración</title>                   <!-- Titulo de la pagina -->
    <script type="text/javascript" src="js/admin.js"> </script>
  </head>

  <style type="text/css">

  option {
  font-family: verdana, arial, helvetica, sans-serif;
  font-size: 12px;
  }
  option.one {}
  option.two {background-color: #999;}
  option.three {background-color: #666; color: white;}

  </style>

<body id="container-page-configAdmin">              <!-- Cuerpo de la pagina -->

<section id="prove-product-cat-config">

<div class="container">             <!-- Contenedor general de la estructura -->

  <!-- Encabezado -->
<div class="page-header">
    <h1>Panel de administración <small class="tittles-pages-logo">
    Farmaceutica San Gabriel </small> </h1>
</div>

<!-- Opciones barra de navegacion -->
<ul class="nav nav-tabs" role="tablist">

  <li role="presentation" class="active">
  <a href="#Pedidos" role="tab" data-toggle="tab">Pedidos</a></li>

  <li role="presentation">
  <a href="#Productos" role="tab" data-toggle="tab">Productos </a> </li>

  <li role="presentation">
  <a href="#Proveedores" role="tab" data-toggle="tab">Proveedores </a> </li>

  <li role="presentation">
  <a href="#Categorias" role="tab" data-toggle="tab">Categorías </a> </li>

  <li role="presentation">
  <a href="#Admins" role="tab" data-toggle="tab">Administradores </a> </li>

</ul>

<!--Panel pedidos-->
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="Pedidos">
<div class="row">
<div class="col-xs-12">

<div id="del-pedido">               <!-- Encabezado seccion eliminar pedidos -->
    <h2 class="text-danger text-center">
    <small><i class="fa fa-trash-o"></i></small>&nbsp;Eliminar pedido</h2>

<!-- Formulario con elace a eliminar pedidos -->
<form action="process/delPedido.php" method="post" role="form">

<div class="form-group">
    <label>Pedidos</label>

<!-- Seleccionador de pedidos -->
    <select class="form-control" name="num-pedido">
<?php
    $pedidoC=  ejecutarSQL::consultar( //Consulta a base de datos de las ventas
                "select * from venta where Estado='pendiente'");
    while($pedidoD=mysql_fetch_array($pedidoC)){ //Ciclo para mostrar las ventas
    echo'<option value="'.$pedidoD['NumPedido'].'">Pedido #'.
    $pedidoD['NumPedido'].' - Estado('.$pedidoD['Estado'].') -
    Fecha('.$pedidoD['Fecha'].')</option>';
}                                                                //fin del ciclo
?>
</select>                                             <!-- Fin seleccionador -->
</div>

<!-- boton Eliminar pedido -->
    <p class="text-center">
    <button type="submit" class="btn btn-danger">Eliminar pedido </button> </p>

<div id="res-form-del-pedido" style="width:100%; text-align:center; margin:0;">
</div>
</form>                              <!-- Fin de formulario eliminar pedidos -->
</div>

<div class="panel panel-info">

<!-- Sección actualizar pedido -->
<div class="panel-heading text-center">
    <i class="fa-2x"> </i> <h3>Actualizar estado de pedido </h3>
</div>

<!-- Tabla de pedidos -->
<div class="table-responsive">
    <table class="table table-bordered">
    <tr>
     <th class="text-center">Folío</th>
     <th class="text-center">Fecha</th>
     <th class="text-center">Cliente</th>
     <th class="text-center">DirecEnvio</th>
     <th class="text-center">Total</th>
     <th class="text-center">Estado</th>
     <th class="text-center">Opciones</th>
    </tr>

<tbody>
<?php
    $pedidoU=  ejecutarSQL::consultar(   //Consulta a la base de datos de ventas
               "select * from venta");
    $upp=1;

    while($peU=mysql_fetch_array($pedidoU)){      //Ciclo para mostar las ventas
    echo'
<div id="update-pedido">

<form method="post" action="process/updatePedido.php"
    id="res-update-pedido-'.$upp.'">
    <tr>
     <td>'.$peU['NumPedido'].'<input type="hidden"
             name="num-pedido" value="'.$peU['NumPedido'].'">
     </td>
     <td>'.$peU['Fecha'].'</td>
    <td>';
    $conUs= ejecutarSQL::consultar(                //Consulta ventas por cliente
            "select * from cliente where NIT='".$peU['NIT']."'");

    while($UsP=mysql_fetch_array($conUs)){//Ciclo para mostrar datos del cliente
    echo $UsP['NIT'];
}
    echo'
    </td>
    <td>'.$peU['DirecEnvio'].'</td>
    <td>'.$peU['TotalPagar'].'</td>
    <td>';

    if($peU['Estado']=="Pendiente"){          //Condición de busqueda pendientes
      echo'<select style="background-color: #fdfd96;"
      class="form-control" name="pedido-status">';
    echo'<option value="Pendiente">Pendiente</option>';
    echo'<option value="Entregado">Entregado</option>';
    echo'<option value="Declinado">Declinado</option>';
}

    if($peU['Estado']=="Entregado"){          //Condición de busqueda entregados
    echo'<select style="background-color: #bdecb6;"
    class="form-control" name="pedido-status">';
    echo'<option value="Entregado"> Entregado</option>';

}

    if($peU['Estado']=="Declinado"){          //Condición de busqueda declinados
      echo'<select style="background-color: #fdbcb4;"
      class="form-control" name="pedido-status">';
    echo'<option value="Declinado">Declinado</option>';
    echo'<option value="Pendiente">Pendiente</option>';
    echo'<option value="Entregado">Entregado</option>';
}
//Boton para actualizar el estatus del pedido
    echo'
    </select>
    </td>
    <td class="text-center">
    <button type="submit" class="btn btn-sm btn-primary button-UPPE"
    value="res-update-pedido-'.$upp.'">Actualizar</button>

<div id="res-update-pedido-'.$upp.'" style="width:100%;">
</div>
    </td>
   </tr>
    </form>
</div>';
    $upp=$upp+1;
}
?>
    </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

<!--Panel productos-->
<div role="tabpanel" class="tab-pane fade" id="Productos">
<div class="row">
<div class="col-xs-12 col-sm-6">
<div id="add-product">
    <h2 class="text-primary text-center">
    <small> <i class="fa fa-plus"> </i>
    </small>Agregar un producto nuevo</h2>
<!--Formulario contenedor de registrar producto-->
<form role="form" action="process/regproduct.php" method="post"
    enctype="multipart/form-data">

<div class="form-group">                          <!--Sección codigo producto-->
    <label>Código de producto</label>
    <input type="text" class="form-control"  placeholder="Código" required
    maxlength="30" name="prod-codigo">
</div>

<div class="form-group">                          <!--Sección nombre producto-->
    <label>Nombre de producto</label>
    <input type="text" class="form-control"  placeholder="Nombre" required
    maxlength="30" name="prod-name">
</div>

<div class="form-group">                       <!--Sección categoría producto-->
    <label>Categoría</label>
    <select class="form-control" name="prod-categoria">

<!--Consulta para obtener las categoría-->
<?php
    $categoriac=  ejecutarSQL::consultar(
                  "select * from categoria");
    while($catec=mysql_fetch_array($categoriac)){
    echo'<option value="'.$catec['CodigoCat'].'">'.$catec['Nombre'].'</option>';
}
?>
<!--Fin de consulta-->

    </select>
</div>

<div class="form-group">                          <!--Sección precio producto-->
    <label>Precio</label>
    <input type="text" class="form-control" placeholder="Precio" required
    maxlength="20" pattern="[0-9]{1,20}" name="prod-price">
</div>

<div class="form-group">                    <!--Sección presentación producto-->
    <label>Presentación</label>
    <input type="text" class="form-control" placeholder="Presentación" required
    maxlength="30" name="prod-model">
</div>

<div class="form-group">                           <!--Sección marca producto-->
    <label>Marca</label>
    <input type="text" class="form-control" placeholder="Marca" required
    maxlength="30" name="prod-marca">
</div>

<div class="form-group">                        <!--Sección stock de producto-->
    <label>Unidades disponibles</label>
    <input type="text" class="form-control"  placeholder="Unidades" required
    maxlength="20" pattern="[0-9]{1,20}" name="prod-stock">
</div>

<div class="form-group">                   <!--Sección proveedor del producto-->
    <label>Proveedor</label>
    <select class="form-control" name="prod-codigoP">

<!--Consulta para obtener los proveedores-->
<?php
    $proveedoresc=  ejecutarSQL::consultar(
                    "select * from proveedor");
    while($provc=mysql_fetch_array($proveedoresc)){
    echo'
    <option value="'.$provc['NITProveedor'].'">'.$provc['NombreProveedor'].'
    </option>';
}
?>
<!--Fin de consulta-->

    </select>
</div>

<div class="form-group">                      <!--Sección Imagen del producto-->
    <label>Imagen de producto</label>
    <input type="file" class="btn btn-success" name="img">
    <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg </p>
</div>

    <input type="hidden" name="admin-name"
    value="<?php echo $_SESSION['nombreAdmin'] ?>">
    <p class="text-center">

<!--Botón de confirmación-->
      <button type="submit" class="btn btn-primary">
      Agregar a la tienda </button> </p>

<div id="res-form-add" style="width: 100%; text-align: center; margin: 0;">
</div>

</form>                                <!--Fin de formulario Agregar producto-->

</div>
</div>

<div class="col-xs-12 col-sm-6">
<div id="del-prod-form">
    <h2 class="text-danger text-center"> <small> <i class="fa fa-trash-o"></i>
    </small>&nbsp;Eliminar un producto</h2>

<!--Formulario Eliminar producto-->
<form action="process/delprod.php" method="post" role="form">

<div class="form-group">
    <label>Productos</label>
<!--Lista desplegable de los productos-->
    <select class="form-control" name="prod-code">
<!--Consulta para obtener los producto registrados-->
<?php
    $productoc=  ejecutarSQL::consultar(
                 "select * from producto");
    while($prodc=mysql_fetch_array($productoc)){
    echo'
    <option value="'.$prodc['CodigoProd'].'">
    '.$prodc['Marca'].'-'.$prodc['NombreProd'].'-'.$prodc['presentacion'].'
    </option>';
}
?>
<!--Fin de consulta-->

    </select>
</div>
    <p class="text-center">
<!--Botón para confirmar la eliminación-->
    <button type="submit" class="btn btn-danger">Eliminar </button> </p>

<div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;">
</div>
</form>                                                 <!--Fin de formulario-->

</div>
</div>

<div class="col-xs-12">
<div class="panel panel-info">
<div class="panel-heading text-center">
    <i class="fa-2x"> </i> <h3>Actualizar datos de producto </h3> </div>
<div class="table-responsive">

<!--Tabla de los productos-->
<table class="table table-bordered">
<thead class="">
   <tr>
    <th class="text-center">Código</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Categoría</th>
    <th class="text-center">Precio</th>
    <th class="text-center">Presentación</th>
    <th class="text-center">Marca</th>
    <th class="text-center">Unidades</th>
    <th class="text-center">Proveedor</th>
    <th class="text-center">Opciones</th>
   </tr>
</thead>
<tbody>

<!--Consulta para obtener los productos-->
<?php
    $productos=  ejecutarSQL::consultar(
                 "select * from producto");
    $upr=1;

//Ciclo para mostrar los productos
    while($prod=mysql_fetch_array($productos)){
    echo'
<div id="update-product">

<form method="post" action="process/updateProduct.php"
    id="res-update-product-'.$upr.'">
   <tr>
    <td>
    <input class="form-control" type="hidden" name="code-old-prod"
    required="" value="'.$prod['CodigoProd'].'">
    <input class="form-control" type="text" name="code-prod" maxlength="30"
    required="" value="'.$prod['CodigoProd'].'">
    </td>
    <td><input class="form-control" type="text" name="prod-name" maxlength="30"
     required="" value="'.$prod['NombreProd'].'">
    </td>
    <td>';

//Consulta para mostrar la categoria por producto
    $categoriac3=  ejecutarSQL::consultar(
                   "select * from categoria where
            CodigoCat='".$prod['CodigoCat']."'");

//Ciclo para mostrar la categoria
    while($catec3=mysql_fetch_array($categoriac3)){
    $codeCat=$catec3['CodigoCat'];
    $nameCat=$catec3['Nombre'];
}
    echo'
    <select class="form-control" name="prod-category">';
    echo '<option value="'.$codeCat.'">'.$nameCat.'
    </option>';

//Consulta para mostrar la categoria en el menu desplegable
    $categoriac2=  ejecutarSQL::consultar(
                   "select * from categoria");
//Ciclo para mostrar la categoria en el menu desplegable
    while($catec2=mysql_fetch_array($categoriac2)){
    if($catec2['CodigoCat']==$codeCat){
}else {
    echo '<option value="'.$catec2['CodigoCat'].'">'.$catec2['Nombre'].'
    </option>';
}
}
    echo'
    </select>
    </td>
    <td>
    <input class="form-control" type="text-area" name="price-prod" required=""
    value="'.$prod['Precio'].'">
    </td>
    <td>
    <input class="form-control" type="tel" name="presentacion-prod" required=""
    maxlength="20" value="'.$prod['presentacion'].'">
    </td>
    <td><input class="form-control" type="text-area" name="marca-prod"
    maxlength="30" required="" value="'.$prod['Marca'].'">
    </td>
    <td>
    <input class="form-control" type="text-area" name="stock-prod"
    maxlength="30" required="" value="'.$prod['Stock'].'">
    </td>
    <td>';
//Consulta para mostrar los proveedores
    $proveedoresc3=  ejecutarSQL::consultar(
                     "select * from proveedor where
    NITProveedor='".$prod['NITProveedor']."'");

//Ciclo para mostrar los proveedores
    while($provc3=mysql_fetch_array($proveedoresc3)){
    $nombreP=$provc3['NombreProveedor'];
    $nitP=$provc3['NITProveedor'];
}
    echo'
    <select class="form-control" name="prod-Prove">';
    echo'
    <option value="'.$nitP.'">'.$nombreP.'
    </option>';

//Consulta para mostrar los proveedores en el menu desplegable
    $proveedoresc2=  ejecutarSQL::consultar(
                     "select * from proveedor");

//Ciclo para mostrar los proveedores en el menu desplegable
    while($provc2=mysql_fetch_array($proveedoresc2)){
    if($provc2['NITProveedor']==$nitP){
}else {
     echo'
     <option value="'.$provc2['NITProveedor'].'">'.$provc2['NombreProveedor'].'
     </option>';
}
}
    echo '
    </select>
    </td>
    <td class="text-center">
    <button type="submit" class="btn btn-sm btn-primary button-UPR"
    value="res-update-product-'.$upr.'">Actualizar
    </button>
    <div id="res-update-product-'.$upr.'" style="width: 100%;
    margin:0px; padding:0px;">
    </div>
    </td>
   </tr>
    </form>
</div>';
    $upr=$upr+1;
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<!--Panel Proveedores-->
<div role="tabpanel" class="tab-pane fade" id="Proveedores">
<div class="row">

<div class="col-xs-12 col-sm-6">
<div id="add-provee">
    <h2 class="text-primary text-center"> <small>
    <i class="fa fa-plus"> </i> </small>&nbsp;Agregar un proveedor</h2>

<!--Formulario para registrar proveedores-->
<form action="process/regprove.php" method="post" role="form">

<div class="form-group">                            <!--Seccion RFC Proveedor-->
    <label>RFC</label>
    <input class="form-control" type="text" name="prove-nit"
    placeholder="NIT proveedor" maxlength="30" required="">
</div>

<div class="form-group">                         <!--Seccion nombre Proveedor-->
   <label>Nombre</label>
   <input class="form-control" type="text" name="prove-name"
   placeholder="Nombre proveedor" maxlength="30" required="">
</div>

<div class="form-group">                      <!--Seccion dirección Proveedor-->
    <label>Dirección</label>
    <input class="form-control" type="text" name="prove-dir"
    placeholder="Dirección proveedor" required="">
</div>

<div class="form-group">                       <!--Seccion Teléfono Proveedor-->
    <label>Teléfono</label>
    <input class="form-control" type="tel" name="prove-tel"
    placeholder="Número telefónico" pattern="[0-9]{1,20}"
    maxlength="20" required="">
</div>

<div class="form-group">                     <!--Seccion página web Proveedor-->
    <label>Página web</label>
    <input class="form-control" type="text" name="prove-web"
    placeholder="Página web proveedor" required="">
</div>

<p class="text-center">

<!--Botón confirmar agregar proveedor-->
  <button type="submit" class="btn btn-primary">Añadir proveedor </button> </p>

<div id="res-form-add-prove" style="width:100%; text-align: center; margin:0;">
</div>

</form>
</div>
</div>

<div class="col-xs-12 col-sm-6">
<div id="del-prove">
    <h2 class="text-danger text-center">
    <small><i class="fa fa-trash-o"> </i> </small>
    &nbsp;Eliminar un proveedor</h2>

<!--Formulario eliminar Proveedor-->
<form action="process/delprove.php" method="post" role="form">

<div class="form-group">
    <label>Proveedores</label>

<!--Listado de Proveedores-->
    <select class="form-control" name="nit-prove">
 <?php

 //Consulta para mostrar los proveedores
    $proveNIT=  ejecutarSQL::consultar(
                "select * from proveedor");

//Ciclo para mostrar los proveedores
    while($PN=mysql_fetch_array($proveNIT)){
    echo'
    <option value="'.$PN['NITProveedor'].'">'.$PN['NITProveedor'].'
    - '.$PN['NombreProveedor'].'</option>';
}
?>
</select>
</div>
    <p class="text-center">

<!--Botón eliinar proveedor-->
    <button type="submit" class="btn btn-danger">Eliminar proveedor
    </button> </p>
<div id="res-form-del-prove" style="width:100%; text-align: center; margin:0;">
</div>
</form>

</div>
</div>

<div class="col-xs-12">
<div class="panel panel-info">
<div class="panel-heading text-center">
    <i class="fa-2x">  </i> <h3>Actualizar datos de proveedor </h3> </div>
<div class="table-responsive">

<!--tabla de proveedores-->
<table class="table table-bordered">
<thead class="">
   <tr>
    <th class="text-center">NIT</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Dirección</th>
    <th class="text-center">Telefono</th>
    <th class="text-center">Página web</th>
    <th class="text-center">Opciones</th>
   </tr>
</thead>
<tbody>

<!--Consulta para mostrar proveedores-->
<?php
    $proveedores=  ejecutarSQL::consultar(
                   "select * from proveedor");
    $up=1;
//Ciclo para mostrar los proveedores
    while($prov=mysql_fetch_array($proveedores)){
    echo'
<div id="update-proveedor">
<form method="post" action="process/updateProveedor.php"
id="res-update-prove-'.$up.'">
   <tr>
    <td>
    <input class="form-control" type="hidden" name="nit-prove-old" required=""
    value="'.$prov['NITProveedor'].'">
    <input class="form-control" type="text" name="nit-prove" maxlength="30"
    required="" value="'.$prov['NITProveedor'].'">
    </td>
    <td>
    <input class="form-control" type="text" name="prove-name" maxlength="30"
    required="" value="'.$prov['NombreProveedor'].'">
    </td>
    <td>
    <input class="form-control" type="text-area" name="prove-dir" required=""
    value="'.$prov['Direccion'].'"></td>
    <td><input class="form-control" type="tel" name="prove-tel" required=""
    maxlength="20" value="'.$prov['Telefono'].'">
    </td>
    <td> <input class="form-control" type="text-area" name="prove-web"
    maxlength="30" required="" value="'.$prov['PaginaWeb'].'">
    </td>
    <td class="text-center">
    <button type="submit" class="btn btn-sm btn-primary button-UP"
    value="res-update-prove-'.$up.'">Actualizar
    </button>
    <div id="res-update-prove-'.$up.'" style="width: 100%; margin:0px;
    padding:0px;"></div>
    </td>
   </tr>
</form>

</div>';
    $up=$up+1;
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>

<!--Panel Categorias-->
<div role="tabpanel" class="tab-pane fade" id="Categorias">
<div class="row">
<div class="col-xs-12 col-sm-6">
<div id="add-categori">
     <h2 class="text-info text-center"> <small>
     <i class="fa fa-plus"> </i> </small>&nbsp;Agregar categoría</h2>

<!--Formulario de categoriás-->
<form action="process/regcategori.php" method="post" role="form">
<div class="form-group">                         <!--Seccion código categoría-->
    <label>Código</label>
    <input class="form-control" type="text" name="categ-code"
    placeholder="Código de categoria" maxlength="9" required="">
</div>

<div class="form-group">                         <!--Seccion nombre categoría-->
    <label>Nombre</label>
    <input class="form-control" type="text" name="categ-name"
    placeholder="Nombre de categoria" maxlength="30" required="">
</div>

<div class="form-group">                    <!--Seccion descripción categoría-->
    <label>Descripción</label>
    <input class="form-control" type="text" name="categ-descrip"
    placeholder="Descripcióne de categoria" required="">
</div>

    <p class="text-center">

<!--Botón confirmar agregar categoría-->
    <button type="submit" class="btn btn-primary">Agregar categoría
    </button>
    </p>

<div id="res-form-add-categori" style="width: 100%;
text-align: center; margin: 0;"></div>
</form>
</div>
</div>

<div class="col-xs-12 col-sm-6">

<div id="del-categori">
    <h2 class="text-danger text-center"> <small> <i class="fa fa-trash-o">
    </i> </small>&nbsp;Eliminar una categoría </h2>
<!--Formulario eliminar categoría-->
<form action="process/delcategori.php" method="post" role="form">

<div class="form-group">
    <label>Categorías</label>

<!--Menu desplegable de categoría-->
    <select class="form-control" name="categ-code">
<?php

//Consulta para mostrar las categorías
    $categoriav=  ejecutarSQL::consultar(
                  "select * from categoria");

//Ciclo para mostrar las categorías
    while($categv=mysql_fetch_array($categoriav)){
    echo'
    <option value="'.$categv['CodigoCat'].'">'.$categv['CodigoCat'].'
    - '.$categv['Nombre'].'</option>';
}
?>
</select>
</div>

    <p class="text-center">

<!--Botón eliminar categoría-->
    <button type="submit" class="btn btn-danger">Eliminar categoría
    </button> </p>

<div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;">
</div>
</form>

</div>
</div>

<div class="col-xs-12">
<div class="panel panel-info">
<div class="panel-heading text-center">
  <i class="fa-2x"> </i> <h3>Actualizar categoría </h3> </div>

<div class="table-responsive">

<!--Tabla de categorias-->
<table class="table table-bordered">
<thead class="">
   <tr>
    <th class="text-center">Código</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Descripción</th>
    <th class="text-center">Opciones</th>
   </tr>
</thead>
<tbody>
<?php

//Consulta para mostrar las categorías
    $categorias=  ejecutarSQL::consultar(
                  "select * from categoria");
    $ui=1;

//ciclo para mostrar las categorías
    while($cate=mysql_fetch_array($categorias)){
    echo'
<div id="update-category">

<form method="post" action="process/updateCategory.php"
id="res-update-category-'.$ui.'">
   <tr>
    <td>
    <input class="form-control" type="hidden" name="categ-code-old"
    maxlength="9" required="" value="'.$cate['CodigoCat'].'">
    <input class="form-control" type="text" name="categ-code" maxlength="9"
    required="" value="'.$cate['CodigoCat'].'">
    </td>

    <td>
    <input class="form-control" type="text" name="categ-name" maxlength="30"
    required="" value="'.$cate['Nombre'].'">
    </td>
    <td>
    <input class="form-control" type="text-area" name="categ-descrip"
    required="" value="'.$cate['Descripcion'].'">
    </td>
    <td class="text-center">
    <button type="submit" class="btn btn-sm btn-primary button-UC"
    value="res-update-category-'.$ui.'">Actualizar
    </button>
    <div id="res-update-category-'.$ui.'" style="width: 100%;
    margin:0px; padding:0px;">
    </div>
    </td>
   </tr>
</form>
</div>';
    $ui=$ui+1;
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>

<!--Panel Administrador-->
<div role="tabpanel" class="tab-pane fade" id="Admins">
<div class="row">
<div class="col-xs-12 col-sm-6">

<div id="add-admin">
    <h2 class="text-info text-center"> <small>
    <i class="fa fa-plus"> </i> </small>&nbsp;Agregar administrador </h2>

<!--Formulario para administradores-->
<form action="process/regAdmin.php" method="post" role="form">

<div class="form-group">                  <!--Sección nombre administradores-->
    <label>Nombre</label>
    <input class="form-control" type="text" name="admin-name"
    placeholder="Nombre" maxlength="9" pattern="[a-zA-Z]{4,9}" required="">
</div>

<div class="form-group">              <!--Sección contraseña administradores-->
    <label>Contraseña</label>
    <input class="form-control" type="password" name="admin-pass"
    placeholder="Contraseña" required="">
</div>

    <p class="text-center">

<!--Botón confirmar registroadministrador-->
    <button type="submit" class="btn btn-primary">Agregar administrador
    </button> </p>
<div id="res-form-add-admin" style="width:100%; text-align: center; margin:0;">
</div>
</form>
</div>
</div>

<div class="col-xs-12 col-sm-6">
<div id="del-admin">
    <h2 class="text-danger text-center"><small>
    <i class="fa fa-trash-o"></i></small>&nbsp;Eliminar administrador </h2>

<!--Sección eliminar administradores-->
<form action="process/deladmin.php" method="post" role="form">

<div class="form-group">
    <label>Administradores</label>
    <select class="form-control" name="name-admin">
<?php

//Consulta para mostrar administradores
    $adminCon=  ejecutarSQL::consultar(
                "select * from administrador");

//Ciclo para mostrar administradores
    while($AdminD=mysql_fetch_array($adminCon)){
    echo'
    <option value="'.$AdminD['Nombre'].'">'.$AdminD['Nombre'].'
    </option>';
}
?>
    </select>
</div>
    <p class="text-center">

<!--Botón eliminar administrador-->
    <button type="submit" class="btn btn-danger">Eliminar administrador
    </button>
    </p>

<div id="res-form-del-admin" style="width:100%; text-align: center; margin:0;">
</div>
</form> <!--Fin de formulario eliminación-->

</div>
</div>

<div class="col-xs-12">
</div>
</div>
</div>
</div>
</div>   <!-- Fin de contenedor general-->

</section>

</body>
</html>
