<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('location: index.php');
    }
    require_once('config/sql.php');
    require_once('config/funciones.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['iniciar'])){
        // print_r($_POST);
        $usuario = limpiar($_POST['usuario']);
        $pass = limpiar($_POST['pass']);
        $errores = "";
        if($usuario == ""){
            $errores .= "<li>Debe ingresar un usuario</li>";
        }
        if($pass == ""){
            $errores .= "<li>Debe ingresar un password</li>";
        }
        if($errores == ""){
            $SQL->conect();
            $usuario = $SQL->select("SELECT * FROM tblusuarios WHERE username = '$usuario' AND password = '$pass'");
            $SQL->close();
            // print_r($usuario);
            if(empty($usuario)){
                $errores .= "<li>Usuario o password incorrectos</li>";
            }
            else{
                $usuario = $usuario[0];
                $_SESSION["usuario"]["nombre"] = $usuario["nombreusuario"]." ".$usuario["apellidousuario"];
                $_SESSION["usuario"]["tipo"] = $usuario["tipousuario"];
                $_SESSION["usuario"]["id"] = $usuario["idusuario"];
                // print_r( $_SESSION["usuario"]);
                header('location: index.php');
            }
        }
    }
    require_once('views/login.view.php');
?>