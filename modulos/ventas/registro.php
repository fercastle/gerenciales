<?php
  session_start();
  require_once('../../config/sql.php');
  require_once('../../config/funciones.php');
  if(!isset($_GET['idcliente']) && !isset($_GET['idproducto'])){
    header('location: index.php');
  }
  $idproducto = $_GET['idproducto'];


  $SQL->conect();
  $total_venta = $SQL->select("SELECT * FROM tblproductos WHERE idproducto = $idproducto");
  $precio = $total_venta[0]['precio_venta'];
  $cantidad = $total_venta[0]['cantidad_producto'];
  $cantidad = $cantidad - 1;
  echo $cantidad;

  $fecha = getdate();
  $fecha = $fecha['year'] ."-". $fecha['mon'] ."-". $fecha['mday'];
  $factura = array('idcliente'=>$_GET['idcliente'], 'idusuario'=>$_SESSION['usuario']['id'],
                  'idproducto'=>$_GET['idproducto'], 'fecha_factura'=>$fecha, 'total_venta'=>$precio );
  $producto = array('nombre_producto' => $total_venta[0]['nombre_producto'] , 'precio_compra' => $total_venta[0]['precio_compra'], 'precio_venta' => $total_venta[0]['precio_venta'], 'foto' => $total_venta[0]['foto'],
                    'descripcion' => $total_venta[0]['descripcion'], 'idusuario'=> $total_venta[0]['idusuario'], 'fecha_ingreso' => $total_venta[0]['fecha_ingreso'], 'idproveedor' => $total_venta[0]['idproveedor'],'cantidad_producto'=>$cantidad);
  $SQL->update($producto, 'tblproductos', $_GET['idproducto'], 'idproducto');
  $SQL->insert($factura, 'tblfacturas');
  $SQL->close();
  require_once('../../views/ventas/registro.view.php');
 ?>
