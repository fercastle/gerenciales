<?php
session_start();
require_once('../../config/funciones.php');
require_once('../../config/sql.php');
if(isset($_GET['idproducto']) && isset($_GET['idcliente'])){
  $idcliente =  $_GET['idcliente'];
  $idproducto = $_GET['idproducto'];
}
else{
  header('location: index.php');
}
$SQL->conect();
$cliente = $SQL->select("SELECT * FROM tblclientes INNER JOIN tblusuarios ON tblclientes.idusuario = tblusuarios.idusuario  WHERE idcliente = $idcliente");
$producto = $SQL->select("SELECT * FROM tblproductos INNER JOIN tblusuarios ON tblproductos.idusuario = tblusuarios.idusuario INNER JOIN tblproveedores ON tblproductos.idproveedor = tblproveedores.idproveedor WHERE idproducto = $idproducto");
$SQL->close();
$cliente = $cliente[0];
$producto = $producto[0];
// print_r($cliente);
// print_r($producto);
require_once('../../views/ventas/venta.view.php');
 ?>
