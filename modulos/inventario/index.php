<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('location: ../../login.php');
}

// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");

require_once("../../views/inventario/index.view.php");

 ?>
