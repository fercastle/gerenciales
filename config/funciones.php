<?php

function limpiar($texto){
  return trim(filter_var($texto, FILTER_SANITIZE_STRING));
}

function mostrarFecha($fecha){
  return date("d/m/Y", strtotime($fecha));
}

?>
