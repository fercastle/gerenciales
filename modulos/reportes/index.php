<?php
session_start();
  require_once('../../config/funciones.php');
  require_once('../../config/sql.php');
  if(isset($_POST['buscar'])){
    $nombre = limpiar($_POST['busqueda']);
    $SQL->conect();
    $facturas = $SQL->select("SELECT * FROM tblfacturas INNER JOIN tblclientes ON tblfacturas.idcliente = tblclientes.idcliente INNER JOIN tblusuarios ON tblfacturas.idusuario = tblusuarios.idusuario INNER JOIN tblproductos ON tblfacturas.idproducto = tblproductos.idproducto WHERE LOWER(nombre_cliente) LIKE LOWER('%$nombre%')");
    $SQL->close();
    }
  if (!isset($_POST['buscar'])) {
    $SQL->conect();
    $facturas = $SQL->select("SELECT * FROM tblfacturas INNER JOIN tblclientes ON tblfacturas.idcliente = tblclientes.idcliente INNER JOIN tblusuarios ON tblfacturas.idusuario = tblusuarios.idusuario INNER JOIN tblproductos ON tblfacturas.idproducto = tblproductos.idproducto");
    // echo "<pre>";
    // print_r($facturas);
    // echo "</pre>";
    $SQL->close();
  }

  require_once('../../views/reportes/reportes.view.php');
 ?>
