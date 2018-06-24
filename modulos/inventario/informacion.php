<?php
  session_start();
  // Importamos archivos
  require_once("../../config/funciones.php");
  require_once("../../config/sql.php");

  // Obtenemos la informacion del cliente
  $SQL->conect();
  $productos = $SQL->select("SELECT * FROM tblproductos INNER JOIN tblusuarios ON tblproductos.idusuario = tblusuarios.idusuario INNER JOIN tblproveedores ON tblproductos.idproveedor = tblproveedores.idproveedor WHERE idproducto "."=".$_GET['id']."");
  $SQL->close();
  //print_r($productos);
  // Verificamos si hay datos
  if (empty($productos)) {
    header("location: index.php");
  }

  $productos = $productos[0]; // Accedemos al indice 0
  require_once("../../views/inventario/informacion.view.php");
 ?>
