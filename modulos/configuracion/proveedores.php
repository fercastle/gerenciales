<?php
  require_once('../../config/sql.php');
  $SQL->conect();
  $proveedores = $SQL->select("SELECT * FROM tblproveedores");
  $SQL->close();
  require_once('../../views/configuracion/proveedores.view.php');
 ?>
