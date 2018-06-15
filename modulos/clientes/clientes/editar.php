<?php
session_start();
// Importamos archivos
require_once("../../config/funciones.php");
require_once("../../config/sql.php");

// Almacenamos el id del usuario a editar
if (isset($_GET['id'])) {
  $_SESSION['idUpdate'] = limpiar($_GET['id']);
}

// obtenemos los datos del usuario
$SQL->conect();
$cliente = $SQL->select("SELECT * FROM clientes WHERE idcliente = ".$_SESSION['idUpdate']."");
$SQL->close();

// Verificamos si hay datos
if (empty($cliente)) {
  header("location: index.php");
}

$cliente = $cliente[0]; // Accedemos al indice 0

$_SESSION['temp'] = $cliente;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {

  $_SESSION['temp'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario

  // Limpiamos los datos
  $nombre = limpiar($_SESSION['temp']['nombre']);
  $apellido = limpiar($_SESSION['temp']['apellido']);
  $edad = limpiar($_SESSION['temp']['edad']);
  $telefono = limpiar($_SESSION['temp']['telefono']);
  $direccion = limpiar($_SESSION['temp']['direccion']);

  // Validaciones
  $errores = "";

  // Verificamos que no hayan campos vacios
  if ($nombre == "" || $nombre == NULL) {
    $errores .= "<li>Por favor ingrese el nombre</li>";
  }

  if ($apellido == "" || $apellido == NULL) {
    $errores .= "<li>Por favor ingrese el apellido</li>";
  }

  if ($edad == "" || $edad == NULL) {
    $errores .= "<li>Por favor ingrese la edad</li>";
  }elseif (!is_numeric($edad)) {
    // Verificamos si la edad es un numero
    $errores .= "<li>Por favor una edad valida</li>";
    $_SESSION['temp']['edad'] = ""; // limpiamos el campo edad
  }

  if ($telefono == "" || $telefono == NULL) {
    $errores .= "<li>Por favor ingrese el numero de telefono</li>";
  }

  if ($direccion == "" || $direccion == NULL) {
    $errores .= "<li>Por favor ingrese la direccion</li>";
  }

  if (!isset($_SESSION['temp']['genero'])) {
    $errores .= "<li>Por favor seleccione un genero</li>";
  }else {
    $genero = $_SESSION['temp']['genero'];
  }

  // Si no hay errores procedemos a guardar los datos
  if ($errores == "") {
    // Obtenemos la fecha
    $fecha = getdate(); // Funcion para optener un arreglo con la fecha
    $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday']; // Le damos el formato de anio-mes-dia

    // Preparamos el arreglo
    $cliente = array('nombre' => $nombre , 'apellido' => $apellido , 'genero' => $genero ,
                     'edad' => $edad, 'telefono' => $telefono, 'direccion' => $direccion ,
                     'fecha' => $fecha);

    // Guardamos los datos
    $SQL->conect();
    $SQL->update($cliente, 'clientes', $_SESSION['idUpdate'], 'idcliente' ); // Pasamos el arreglo y el nombre de la tabla
    $SQL->close();
    header("location: index.php");
  }

}

require_once("../../views/clientes/editar.view.php");
?>
