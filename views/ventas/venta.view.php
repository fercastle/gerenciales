<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <title>Venta</title>
</head>
<body>

  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Funeraria "Manantiales de Vida"</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="../inventario/index.php" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a href="../configuracion/index.php" class="dropdown-item">Configuracion</a>
                                                    <a href="../configuracion/usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
                        <div class="dropdown-divider"></div>
                        <a href="../../cerrar.session.php" class="dropdown-item">Cerrar session</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="row">
      <header class="caja offset-1 col-md-10">
        <br>
        <h2>Realizar venta</h2>
      </header>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="alert alert-info">
          <h4>Informacion cliente</h4>
          <br>
          <div class="row">
            <div class="col-md-6">
              <p><b>Nombre</b> <?php echo $cliente['nombre_cliente']?> </p>
            </div>
            <div class="col-md-6">
              <p> <b>Apellido</b> <?php echo $cliente['apellidos_cliente'] ?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Direccion</b> <?php echo $cliente['direccion_cliente']?> </p>
            </div>
          </div>
            <div class="row">
              <div class="col-md-4">
                <p> <b>telefono</b> <?php echo $cliente['tel_cliente']?> </p>
              </div>
              <div class="col-md-4">
                <p> <b>Fecha</b> <?php echo mostrarFecha($cliente['fecha_ingreso_cliente']) ?> </p>
              </div>
              <div class="col-md-4">
                <div class="col-md-12">
                  <p> <b>Registrado por: </b> <?php echo $cliente['username'] ?>
                </div>
              </div>
            </div>
            <br><br><br>
        </div>
      </div>
      <div class="col-md-6">
        <div class="alert alert-danger">
          <h4>Informacion servicio</h4>
          <br>
          <div class="row">
            <div class="col-md-4">
              <p> <b>Nombre producto</b> <?php echo $producto['nombre_producto']?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>precio de compra</b> <?php echo '$'.$producto['precio_compra'] ?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>precio de venta</b> <?php echo '$'.$producto['precio_venta']?> </p>
            </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <p> <b>Descripcion</b> <?php echo $producto['descripcion']?> </p>
          </div>
        </div>
          <div class="row">
            <div class="col-md-4">
              <p> <b>Proveedor</b> <?php echo $producto['nombre_proveedor']?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>Fecha que se ingreso</b> <?php echo mostrarFecha($producto['fecha_ingreso']) ?> </p>
            </div>
            <div class="col-md-2">
              <p> <b>Cantidad</b> <?php echo $producto['cantidad_producto']?> </p>
            </div>
            <div class="col-md-4 ">
                <p> <b>Registrado por: </b> <?php echo $producto['username'] ?>

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-2">
      <?php if ($producto['cantidad_producto'] <= 0): ?>
        <button class="btn btn-secondary btn-block btn-lg" data-target="#error" data-toggle="modal" >Vender</button>
      <?php else: ?>
        <a href="registro.php?idcliente=<?php echo $idcliente?>&idproducto=<?php echo $idproducto?>" class="btn btn-primary btn-block" >Vender</a>
      <?php endif; ?>

      </div>
      <div class="modal fade" id="error">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Advertencia</h5>
              <button class="close" data-dismiss="modal"> <span >&times;</span> </button>
            </div>
            <div class="modal-body">
              <p>No hay articulos en el inventario</p>
            </div>
            <div class="modal-footer">
              <a href="producto.php?id=<?php echo $idcliente ?>" class="btn btn-primary">Seleccionar otro servicio</a>
              <button type="button" class="btn  btn-danger" name="button" data-dismiss="modal">Cerrar</button>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

</body>
</html>
