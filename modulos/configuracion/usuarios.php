<?php
  require_once('../../config/sql.php');
  $SQL->conect();
  $proveedores = $SQL->select("SELECT * FROM tblusuarios");
  $SQL->close();
    require_once('../../views/configuracion/usuarios.view.php');
?>
