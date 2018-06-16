<?php
session_start();
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

$_SESSION['temp'] = $usuario;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {
  $_SESSION['temp'] = $_POST;

  // limpismod los datos
  $nombreusuario = limpiar($_SESSION['temp']['nombreusuario']);
  $apellidousuario = limpiar($_SESSION['temp']['apellidousuario']);
  $fechanacimiento = limpiar($_SESSION['temp']['fechanacimiento']);
  $telefonousuario = limpiar($_SESSION['temp']['telefonousuario']);
  $direccionusuario = limpiar($_SESSION['temp']['direccionusuario']);
  $correousuario = limpiar($_SESSION['temp']['correousuario']);
  $tipousuario = limpiar($_SESSION['temp']['tipousuario']);
  $username = limpiar($_SESSION['temp']['username']);
  $password = limpiar($_SESSION['temp']['password']);
  $password1 = limpiar($_SESSION['temp']['password1']);

  // Validaciones
  $errores = "";

  if ($nombreusuario == '' || $nombreusuario == NULL) {
    $errores .= "<li>Por favor ingrese el nombre del usuario</li>";
  }
  if ($apellidousuario == '' || $apellidousuario == NULL) {
    $errores .= "<li>Por favor ingrese el apellido del usuario</li>";
  }
  if ($fechanacimiento == '' || $fechanacimiento == NULL) {
    $errores .= "<li>Por favor ingrese la fecha de nacimiento del usuario</li>";
  }
  if ($telefonousuario == '' || $telefonousuario == NULL) {
    $errores .= "<li>Por favor ingrese el telefono del usuario</li>";
  }
  if ($direccionusuario == '' || $direccionusuario == NULL) {
    $errores .= "<li>Por favor ingrese la direccion del usuario</li>";
  }
  if ($correousuario == '' || $correousuario == NULL) {
    $errores .= "<li>Por favor ingrese el correo del usuario</li>";
  }
  if ($tipousuario == '' || $tipousuario == NULL) {
    $errores .= "<li>Por favor seleccione el tipo de usuario</li>";
  }
  if ($username == '' || $username == NULL) {
    $errores .= "<li>Por favor ingrese el nombre de usuario</li>";
  }
  if ($password == '' || $password == NULL) {
    $errores .= "<li>Por favor ingrese la Contraseña</li>";
  }
  if ($password != $password1) {
    $errores .= "<li>Las Contraseñas no coinciden</li>";
  }
  if (!isset($_SESSION['temp']['generousuario'])) {
    $errores .= "<li>Por favor seleccione el genero</li>";
  }else {
    $generousuario = $_SESSION['temp']['generousuario'];
  }

  if ($errores == "") {
    $usuario = array('nombreusuario' => $nombreusuario, 'apellidousuario' => $apellidousuario, 'fechanacimiento' => $fechanacimiento,
                      'telefonousuario' => $telefonousuario, 'direccionusuario' => $direccionusuario, 'generousuario' => $generousuario,
                      'correousuario' => $correousuario, 'tipousuario' => $tipousuario, 'username' => $username, 'password' => $password );

    $SQL->conect();
    $SQL->update($usuario, 'tblusuarios', $_SESSION['id'], 'idusuario');
    $SQL->close();

    header("location: index.php");

  }
}


require_once("../../../views/configuracion/usuarios/actualizar.view.php");
?>
