<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <style media="screen">
    form{
      padding: 20px;
      margin-top: 20px;
    }
  </style>
  <title>Datos del producto</title>
</head>
<body>

  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Menu de navegacion</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="/gerenciales/modulos/clientes/index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a href="../" class="dropdown-item">Configuracion</a>
                                                    <a href="../configuracion/usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
                        <div class="dropdown-divider"></div>
                        <a href="../../cerrar.session.php" class="dropdown-item">Cerrar session</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8 alert alert-info">
          <div class="row">
            <header class="col-md-12">
            <h3>Datos de producto</h3>
            </header>

          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <p> <b>Nombre producto</b> <?php echo $productos['nombre_producto']?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>precio de compra</b> <?php echo '$'.$productos['precio_compra'] ?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>precio de venta</b> <?php echo '$'.$productos['precio_venta']?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Descripcion</b> <?php echo $productos['descripcion']?> </p>
            </div>
          </div>
            <div class="row">
              <div class="col-md-4">
                <p> <b>Proveedor</b> <?php echo $productos['nombre_proveedor']?> </p>
              </div>
              <div class="col-md-4">
                <p> <b>Fecha que se ingreso</b> <?php echo mostrarFecha($productos['fecha_ingreso']) ?> </p>
              </div>
              <div class="col-md-4">
                <div class="col-md-12">
                  <p> <b>Registrado por: </b> <?php echo $productos['username'] ?>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <a href="editar.php?id=<?php echo $productos['idproducto'] ?>" class="btn btn-success">Actualizar informacion</a>
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
