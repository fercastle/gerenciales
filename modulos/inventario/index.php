<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('location: ../../login.php');
}

// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['buscar'])){
  $nombre = limpiar($_POST['busqueda']);
  $SQL->conect();
  $productos = $SQL->select("SELECT * FROM tblproductos WHERE LOWER(nombre_producto) LIKE LOWER('%$nombre%')");
  // echo "OOYAAAA";
  // print_r($productos);
  $SQL->close();
}
else{
$SQL->conect();
$productos = $SQL->select("SELECT * FROM tblproductos");
$SQL->close();
}
//print_r($productos);

require_once("../../views/inventario/index.view.php");

 ?>
