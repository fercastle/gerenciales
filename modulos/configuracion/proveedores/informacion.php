<?php
session_start();
// Importamos archivos
require_once("../../../config/funciones.php");
require_once("../../../config/sql.php");

// Obtenemos la informacion del cliente
$SQL->conect();
$proveedor = $SQL->select("SELECT * FROM tblproveedores WHERE idproveedor = ".$_GET['id']."");
$SQL->close();

// Verificamos si hay datos
if (empty($proveedor)) {
  header("location: index.php");
}

$proveedor = $proveedor[0]; // Accedemos al indice 0

require_once("../../../views/clientes/informacion.view.php");
?>
