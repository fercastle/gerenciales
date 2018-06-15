<?php
session_start();
	// si $_SESSION['usuario'] no existe ir a login.php
    if(!isset($_SESSION['usuario'])){
        header('location: login.php');
    }
    require_once('views/index.view.php');
?>