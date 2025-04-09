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
    include './inc/link.php';          //Enlace de estilos y librerias incluidas
    include './inc/navbar.php';                             //Brra de navegación

?>
<!DOCTYPE html>
<html lang="es">
<head>

<title>Mis Pedidos test</title>                          <!-- Titulo de la pagina -->

</head>
<body id="container-page-product">                  <!-- Cuerpo de la pagina -->

<!--Sección Pedidos del cliente -->
<section id="store">

<div class="container">
<div class="page-header">
     <h1>Mis pedidos <small class="tittles-pages-logo">Farmaceutica San Gabriel
     </small> </h1>
</div>

<!--Panel pedidos-->
</div>

<!--Mensaje de entrega-->
<div class="panel panel-warning">
<div class="panel-heading">
    <h6>tiempo estimado de entrega de 30 minutos a 1 hora.
    Si su pedido se atrasa mas de una hora nuestros asesores
    se pondrán en contacto con usted, o bien comuníquese al teléfono
    <strong style="color: black">33-18-54-22-64 </strong>
    o al correo <strong style="color: black">frmaceutica.sg@gmail.com
    </strong> </h6>
</div>

<div class="table-responsive">

<!--tabla de pedidos-->
<table class="table table-bordered">

  <tr>
    <th class="text-center" >Folio</th>
    <th class="text-center">Fecha</th>
    <th class="text-center">Cliente</th>
    <th class="text-center">Dirección de envio</th>
    <th class="text-center">Total</th>
    <th class="text-center">Estado</th>
    <th class="text-center">Opciones</th>
   </tr>


<?php
//Consulta para mostrar las ventas del cliente
    $pedidoU=  ejecutarSQL::consultar(
    "select * from venta where NIT='".$_SESSION['nombreUser']."'"."");
    $upp=1;

//Ciclo para mostrar las ventas del cliente
    while($peU=mysql_fetch_array($pedidoU)){
    echo '
<div id="update-pedido">
<form method="post" action="process/delPedido.php"
id="res-update-pedido-'.$upp.'">
   <tr>
    <td>'.$peU['NumPedido'].'<input type="hidden"
    name="num-pedido" value="'.$peU['NumPedido'].'"></td>
    <td>'.$peU['Fecha'].'</td>
    <td>'.$peU['NIT'].'</td>
    <td>'.$peU['DirecEnvio'].'</td>
    <td>'.$peU['TotalPagar'].'</td>
    <td>';
    if( $peU['Estado']=="Pendiente"){
    echo $peU['Estado'];
}
    if($peU['Estado']=="Entregado"){
    echo $peU['Estado'];
}
    if($peU['Estado']=="Declinado"){
    echo $peU['Estado'];
}
    if( $peU['Estado']=="Pendiente"){
    echo '
    </td>
    <td class="text-center">
    <button type="submit" class="btn btn-sm btn-primary button-UPPE"
    value="res-update-pedido-'.$upp.'">Eiminar o Cancelar </button>
    <div id="res-update-pedido-'.$upp.'" style="width: 170%;
    margin:0px; padding:0px;"></div></td>
   </tr>
</form>
</div>';

}else{
    echo'</td>
    <td class="text-center">
    Sin Acciones
    </td>
   </tr>
</form>
</div>';
}
    $upp=$upp+1; //Actualizador del contador para incrementar las filas
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
