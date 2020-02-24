<!--
"pagina de catalago de productos"
VERSIÓN  2.1
AUTOR CM.Soft
CopyRight 2020
Todos los derechos reservados
 -->
<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
error_reporting(E_PARSE);


include '../library/consulSQL.php';                //Conexión a la base de datos
session_start();

$suma = 0; // contador del total del pedido

if(isset($_GET['precio'])){
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;


echo '
<script type="text/javascript" src="../js/main.js">
</script>
<table >';
}

//Ciclo para agregar los productos seleccionados
for($i = 0;$i< $_SESSION['contador'];$i++){

//Consulta pra ingresar productos a la lista
    $consulta=ejecutarSQL::consultar(
      "select * from producto
      where CodigoProd='".$_SESSION['producto'][$i]."'");
//Ciclo pra ingresar productos a la lista
    while($fila = mysql_fetch_array($consulta)) {

            echo "<tr ><td><input type='text' class='form-control'
            value='".$fila['NombreProd']."' readonly></td><td>
            <input type='text' class='form-control'
            value='".$fila['Precio']."' readonly></td> <td>
            <input type='button' class='btn btn-danger' onclick='remove(this)'
            name='push' value='Eliminar' /> <br></td></tr>";

   $suma += $fila['Precio']; //Modificardor del total del pedido

    }}
echo "<tr><td>Subtotal</td><td>$".$suma."</td></tr> ";
echo "</table>";
$_SESSION['sumaTotal']=$suma;
