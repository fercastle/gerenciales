<?php
  session_start();
  // Importamos archivos
  require_once("../../config/funciones.php");
  require_once("../../config/sql.php");
  if(!isset($_SESSION['usuario'])){
      header('location: ../../login.php');
  }

  // Creamos un arreglo para mantener los datos ingresados por el usuario
  $_SESSION['temp'] = array('nombre_producto' => '' , 'precio_compra' => '', 'precio_venta' => '',
                            'descripcion' => '', 'cantidad_producto'=>'');

  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['guardar'])){
    $_SESSION['temp'] = $_POST; // Almacenamos en el arreglo temporal los datos enviados por el usuario
    $nombre_producto = limpiar($_SESSION['temp']['nombre_producto']);
    $precio_compra = limpiar($_SESSION['temp']['precio_compra']);
    $precio_venta = limpiar($_SESSION['temp']['precio_venta']);
    $descripcion = limpiar($_SESSION['temp']['descripcion']);
    $cantidad_producto = limpiar($_SESSION['temp']['cantidad_producto']);
    // Validaciones
    $errores = "";

    // Verificamos que no hayan campos vacios
    if ($nombre_producto == "" || $nombre_producto == NULL) {
      $errores .= "<li>Por favor ingrese el nombre de producto</li>";
    }
    else{
      if(strlen($nombre_producto) > 40){
        $errores .= "<li>el nombre de producto excede el numero de caracteres permitido</li>";
      }
    }
    if(is_numeric($precio_compra) == false){
      $errores .= "<li>Ingrese un precio de compra correcto</li>";
      $_SESSION['temp']['precio_compra'] = '';
    }
    if(is_numeric($precio_venta) == false){
      $errores .= "<li>Ingrese un precio de venta correcto</li>";
      $_SESSION['temp']['precio_venta'] = '';
    }
    if($descripcion == ""){
      $errores .= "<li>Ingrese una descripcion</li>";
    }
    else{
      if(strlen($descripcion) > 295){
        $errores .= "<li>La descripcion excede el numero de caracteres permitidos</li>";
      }
    }
    if(is_numeric($cantidad_producto) == false){
      $errores .= "<li>Ingrese una cantidad correcta</li>";
      $_SESSION['temp']['cantidad_producto'] = '';
    }
    if($errores == ""){

      // Movemos la imagen
      if (!empty($_FILES['foto']) && $_FILES['foto']['error'] !== 4) {

        // Obtenemos el id de la imagen
        $SQL->conect();
        $id = $SQL->select("SELECT idproducto FROM tblproductos ORDER BY idproducto DESC  LIMIT 1");
        $SQL->close();

        if (empty($id)) {
          $id = 1;
        }else {
          $id = $id[0][0];
          $id++; // Sumamos uno al id del usuario anterior
        }

        $check = @getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
          $extencion = '';

          if ($_FILES['foto']['type'] == 'image/jpeg') {
            $extencion = '.jpg';
          }elseif ($_FILES['foto']['type'] == 'image/png') {
            $extencion = '.png';
          }

          $carpeta_destino = '../../img/inventario/';
          $archivo_subido = $carpeta_destino . $id . '_' . $nombre_producto . $extencion;
          move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        }
      }
      // agregamos la fecha del registro
      $fecha = getdate();
      $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday']; // Le damos el formato de anio-mes-dia
      $producto = array('nombre_producto' => $nombre_producto , 'precio_compra' => $precio_compra, 'precio_venta' => $precio_venta, 'foto' => $archivo_subido,
                        'descripcion' => $descripcion, 'idusuario'=> $_SESSION['usuario']['id'], 'fecha_ingreso' => $fecha, 'idproveedor' => $_POST['idproveedor'],
                         'cantidad_producto' => $cantidad_producto);
                                // Guardamos los datos
      $SQL->conect();
      $SQL->insert($producto, 'tblproductos'); // Pasamos el arreglo y el nombre de la tabla
      $SQL->close();
      header("location: index.php");
    }
  }
  // Obtenemos los datos para llenar la tabla
  $SQL->conect();
  $proveedores = $SQL->select("SELECT * FROM tblproveedores");
  $SQL->close();

  // Cargando la informacion a la vista
  require_once("../../views/inventario/nuevo.view.php");
 ?>
