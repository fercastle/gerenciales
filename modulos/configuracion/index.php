<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('location: ../../login.php');
    }
    if($_SESSION['usuario']['tipo'] != 2){
        header('location: ../../index.php');
    }
    require_once('../../views/clientes/index.view.php');
?>
