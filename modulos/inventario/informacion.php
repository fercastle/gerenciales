<?php
  session_start();
  // Importamos archivos
  require_once("../../config/funciones.php");
  require_once("../../config/sql.php");

  if(isset($_GET['id'])){
    $_SESSION['id'] = limpiar($_GET['id']);
  }

  // Obtenemos la informacion del cliente
  $SQL->conect();
  $productos = $SQL->select("SELECT * FROM tblproductos INNER JOIN tblusuarios ON tblproductos.idusuario = tblusuarios.idusuario INNER JOIN tblproveedores ON tblproductos.idproveedor = tblproveedores.idproveedor WHERE idproducto "."=".$_SESSION['id']."");
  $SQL->close();

  if (empty($productos)) {
    header("location: index.php");
  }

  $productos = $productos[0]; // Accedemos al indice 0
  $_SESSION['temp'] = $productos;
  if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['guardar'])){
    $_SESSION['tem'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario
    // Limpiamos los datos
    $cantidad = limpiar($_SESSION['tem']['cantidad']);


    // Validaciones
    $errores = "";
    // Verificamos que no hayan campos vacios
    if($cantidad == "" or is_numeric($cantidad) == false){
      $errores .= "<li>Ingrese una cantidad correcta</li>";
      $_SESSION['temp']['cantidad'] = '';
    }
    if($cantidad <= 0){
      $errores .= "<li>Ingrese un numero positivo</li>";
    }

    if($errores == "" ){

      $cantidad = intval($cantidad) + intval($_SESSION['temp']['cantidad_producto']);
      // agregamos la fecha del registro
      $fecha = getdate(); //obtenemos la fecha
      $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday']; // Le damos el formato de anio-mes-dia
      $producto = array('nombre_producto' => $productos['nombre_producto'] , 'precio_compra' => $productos['precio_compra'], 'precio_venta' => $productos['precio_venta'], 'foto' => $productos['foto'],
                        'descripcion' => $productos['descripcion'], 'idusuario'=> $_SESSION['usuario']['id'], 'fecha_ingreso' => $fecha, 'idproveedor' => $productos['idproveedor'],'cantidad_producto'=>$cantidad);

      // Guardamos los datos
      $SQL->conect();
      $SQL->update($producto, 'tblproductos', $_SESSION['id'], 'idproducto' ); // Pasamos el arreglo y el nombre de la tabla
      $SQL->close();
      //Recargamos la pagina para actualizar
      header('location: informacion.php');

    }

    }


  require_once("../../views/inventario/informacion.view.php");
 ?>
