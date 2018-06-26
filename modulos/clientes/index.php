<?php
session_start();
// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");

// Creamos un arreglo para mantener los datos ingresados por el usuario
$_SESSION['temp'] = array('nombre' => '' , 'apellido' => '', 'direccion' => '',
                          'telefono' => '');
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['buscar'])){
  $nombre = limpiar($_POST['busqueda']);
  $SQL->conect();
  $clientes = $SQL->select("SELECT * FROM tblclientes WHERE LOWER(nombre_cliente) LIKE LOWER('%$nombre%')");
  $SQL->close();
  }
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {

  $_SESSION['temp'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario

  // Limpiamos los datos
  $nombre = limpiar($_SESSION['temp']['nombre']);
  $apellido = limpiar($_SESSION['temp']['apellido']);
  $direccion = limpiar($_SESSION['temp']['direccion']);
  $telefono = limpiar($_SESSION['temp']['telefono']);


  // Validaciones
  $errores = "";

  // Verificamos que no hayan campos vacios
  if ($nombre == "" || $nombre == NULL) {
    $errores .= "<li>Por favor ingrese el nombre</li>";
  }

  if ($apellido == "" || $apellido == NULL) {
    $errores .= "<li>Por favor ingrese el apellido</li>";
  }
  if ($direccion == "" || $direccion == NULL) {
    $errores .= "<li>Por favor ingrese la direccion</li>";
  }

  if ($telefono == "" || $telefono == NULL) {
    $errores .= "<li>Por favor ingrese el numero de telefono</li>";
  }


  // Si no hay errores procedemos a guardar los datos
  if ($errores == "") {
    // Obtenemos la fecha
    $fecha = getdate(); // Funcion para optener un arreglo con la fecha
    $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday']; // Le damos el formato de anio-mes-dia

    // Preparamos el arreglo
    $cliente = array('nombre_cliente' => $nombre , 'apellidos_cliente' => $apellido,
                     'direccion_cliente' => $direccion, 'tel_cliente' => $telefono,
                     'fecha_ingreso_cliente' => $fecha, 'idusuario'=> $_SESSION['usuario']['id']);

    // Guardamos los datos
    $SQL->conect();
    $SQL->insert($cliente, 'tblclientes'); // Pasamos el arreglo y el nombre de la tabla
    $SQL->close();
    header("location: index.php");
  }

}
if(!isset($_POST['buscar']) and (!isset($_POST['guardar'])) or isset($_POST['guardar'])){
  // Obtenemos los datos para llenar la tabla
  $SQL->conect();
  $clientes = $SQL->select("SELECT * FROM tblclientes");
  $SQL->close();
}


// Cargamos la vista
require_once("../../views/clientes/index.view.php");
?>
