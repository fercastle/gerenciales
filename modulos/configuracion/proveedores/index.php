<?php
session_start();
//evitamos que alguine mas que el usuario pueda acceder a esta informacion
if($_SESSION["usuario"]["tipo"] != 2){
  header('location: ../../../index.php');
}

// Importamos archivos
require_once("../../../config/funciones.php");
require_once("../../../config/sql.php");


// Creamos un arreglo para mantener los datos ingresados por el usuario
$_SESSION['temp'] = array('nombre' => '' , 'direccion' => '', 'correo' => '',
                          'telefono' => '', 'fecha' => '', 'descripcion' => '');

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
    $proveedor = array('nombre_roveedor' => $nombre , 'direccion_proveedor' => $direccion, 'telefono_proveedor' => $telefono, 'correo_proveedor' => $correo,
                       'descripcion_proveedor' => $descripcion, 'fecha_registroprov' => $fecha, 'idusuario' => $_SESSION['usuario']['id']);


    // Guardamos los datos
    $SQL->conect();
    $SQL->insert($proveedor, 'tblproveedores'); // Pasamos el arreglo y el nombre de la tabla
    $SQL->close();
    header("location: index.php");
  }

}

// Obtenemos los datos para llenar la tabla
$SQL->conect();
$proveedores = $SQL->select("SELECT * FROM tblproveedores");
$SQL->close();
// Cargamos la vista
require_once("../../../views/configuracion/proveedores/index.view.php");
?>
