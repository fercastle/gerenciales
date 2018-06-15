<?php
session_start();
// Importamos archivos
require_once("../../../config/funciones.php");
require_once("../../../config/sql.php");
//Almacenamos el id del usuario a editar
if (isset($_GET['id'])) {
  $_SESSION['idproveedor'] = limpiar($_GET['id']);
}
//Obteniendo los datos del idusuario
$SQL->conect();
$proveedor = $SQL->select("SELECT * FROM tblproveedores WHERE idproveedor= ".$_SESSION['idUpdate']."");
$SQL->close();
// print_r($proveedor);
//verificando si hay datos
if (empty($proveedor)) {
  header("loction: index.php");
}
$proveedor = $proveedor[0]; //accedemos al indice cero
// Creamos un arreglo para mantener los datos ingresados por el usuario
$_SESSION['temp'] = $proveedor;
// print_r($_SESSION['temp']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {

  $_SESSION['temp'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario

  // Limpiamos los datos
  $nombre = limpiar($_SESSION['temp']['nombre']);
  $direccion = limpiar($_SESSION['temp']['direccion']);
  $correo = limpiar($_SESSION['temp']['correo']);
  $telefono = limpiar($_SESSION['temp']['telefono']);
  // $fecha = limpiar($_SESSION['temp']['fecha']);
  $descripcion = limpiar($_SESSION['temp']['descripcion']);

  // Validaciones
  $errores = "";
  // Verificamos que no hayan campos vacios
  if ($nombre == "" || $nombre == NULL) {
    $errores .= "<li>Por favor ingrese el nombre</li>";
  }

  if ($direccion == "" || $direccion == NULL) {
    $errores .= "<li>Por favor ingrese una direccion</li>";
  }

  if ($correo == "" || $correo == NULL) {
    $errores .= "<li>Por favor ingrese un correo</li>";
  }

  if ($telefono == "" || $telefono == NULL) {
    $errores .= "<li>Por favor ingrese el numero de telefono</li>";
  }

  if ($descripcion == "" || $descripcion == NULL) {
    $errores .= "<li>Por favor ingrese la descripcion</li>";
  }
  // Si no hay errores procedemos a guardar los datos
  if ($errores == "") {
    // Obtenemos la fecha
    $fecha = getdate(); // Funcion para optener un arreglo con la fecha
    $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday']; // Le damos el formato de anio-mes-dia

    // Preparamos el arreglo
    $proveedor = array('nombre_proveedor' => $nombre , 'direccion_proveedor' => $direccion, 'telefono_proveedor' => $telefono, 'correo_proveedor' => $correo,
                       'descripcion_proveedor' => $descripcion, 'fecha_registroprov' => $fecha, 'idusuario' => $_SESSION['usuario']['id']);


    // Guardamos los datos
    $SQL->conect();
    $SQL->update($proveedor, 'tblproveedores', $_SESSION['idproveedor'], 'idproveedor'); // Pasamos el arreglo y el nombre de la tabla
    $SQL->close();
    header("location: index.php");
  }

}

// Cargamos la vista
require_once("../../../views/configuracion/proveedores/editar.view.php");
?>
