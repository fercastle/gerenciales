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
$cliente = $SQL->select("SELECT * FROM tblclientes WHERE idcliente = ".$_SESSION['idUpdate']."");
$SQL->close();

// Verificamos si hay datos
if (empty($cliente)) {
  header("location: index.php");
}

$cliente = $cliente[0]; // Accedemos al indice 0

$_SESSION['temp'] = $cliente;
//print_r($_SESSION['temp']);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {
  // print_r($_POST);
  $_SESSION['temp'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario

  // Limpiamos los datos
  $nombre = limpiar($_SESSION['temp']['nombre_cliente']);
  $apellido = limpiar($_SESSION['temp']['apellidos_cliente']);
  $direccion = limpiar($_SESSION['temp']['direccion_cliente']);
  $telefono = limpiar($_SESSION['temp']['tel_cliente']);


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
    $cliente = array('nombre_cliente' => $nombre , 'apellidos_cliente' => $apellido ,
                     'direccion_cliente' => $direccion, 'tel_cliente' => $telefono,
                     'fecha_ingreso_cliente' => $fecha, 'idusuario'=> $_SESSION['usuario']['id']);

    // Guardamos los datos
    $SQL->conect();
    $SQL->update($cliente, 'tblclientes', $_SESSION['idUpdate'], 'idcliente' ); // Pasamos el arreglo y el nombre de la tabla
    $SQL->close();
    //header("location: index.php");
  }

}

require_once("../../views/clientes/editar.view.php");
?>
