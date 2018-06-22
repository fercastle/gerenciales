<?php
session_start();

//evitamos que alguine mas que el usuario pueda acceder a esta informacion
if($_SESSION["usuario"]["tipo"] != 2){
  header('location: ../../../index.php');
}

require_once('../../../config/sql.php');
require_once('../../../config/funciones.php'); // Importamos funciones

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $_SESSION['id'] = $_GET['id'];
}

$SQL->conect();
$usuario = $SQL->select("SELECT * FROM tblusuarios WHERE idusuario = ".$_SESSION['id']."");
$SQL->close();

if (empty($usuario)) {
  header("location: index.php");
  // echo "error";
}else {
  $usuario = $usuario[0];
}

require_once("../../../views/configuracion/usuarios/informacion.view.php");

?>
