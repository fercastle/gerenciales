<?php
session_start();
// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");

// Obtenemos la informacion del cliente
$SQL->conect();
$cliente = $SQL->select("SELECT * FROM clientes WHERE idcliente = ".$_GET['id']."");
$SQL->close();

// Verificamos si hay datos
if (empty($cliente)) {
  header("location: index.php");
}

$cliente = $cliente[0]; // Accedemos al indice 0

require_once("../../views/clientes/informacion.view.php");
?>
