<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('location: ../../login.php');
}

// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");
$SQL->conect();
$productos = $SQL->select("SELECT * FROM tblproductos");
$SQL->close();
//print_r($productos);

require_once("../../views/inventario/index.view.php");

 ?>
