<?php
session_start();

//evitamos que alguine mas que el usuario pueda acceder a esta informacion
if($_SESSION["usuario"]["tipo"] != 2){
  header('location: ../../../index.php');
}

// Importamos archivos
require_once("../../../config/funciones.php");
require_once("../../../config/sql.php");

// Obtenemos la informacion del cliente
$SQL->conect();
$proveedor = $SQL->select("SELECT * FROM tblproveedores INNER JOIN tblusuarios ON tblproveedores.idusuario = tblusuarios.idusuario WHERE idproveedor "."=".$_GET['id']."");
$SQL->close();

// Verificamos si hay datos
// if (empty($proveedor)) {
//   header("location: index.php");
// }

$proveedor = $proveedor[0]; // Accedemos al indice 0
// print_r($proveedor);

require_once("../../../views/configuracion/proveedores/informacion.view.php");
?>
