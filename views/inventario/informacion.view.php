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
                    <a href="index.php" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="../configuracion" class="dropdown-item">Configuracion</a>
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
              <div class="col-md-2">
                <p> <b>Cantidad</b> <?php echo $productos['cantidad_producto']?> </p>
              </div>
              <div class="col-md-4 ">
                  <p> <b>Registrado por: </b> <?php echo $productos['username'] ?>

              </div>
            </div>
            <div class="row">
              <div class="col-md-3 offset-3">
                <a href="editar.php?id=<?php echo $productos['idproducto'] ?>" class="btn btn-success">Actualizar informacion</a>
              </div>
              <div class="col-md-5 offset-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar">Reabastecer</button>

              </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="modal fade" id="agregar" tabindex="-1" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Reabastecer</h5>
              <button type="button" name="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cantidad">Cantidad</label>
                      <input type="text" name="cantidad" id="cantidad" placeholder="Agregar cantidad " class="form-control">
                    </div>
                  </div>

                </div>


                <?php if (!isset($_POST['buscar'])): ?>
                  <!-- Errores -->
                  <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && $errores != ""): ?>
                    <div class="row justify-content-center">
                      <div class="col-md-11 alert alert-danger">
                        <ul>

                          <?php echo $errores ?>


                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="modal-footer">
                <input type="submit" name="guardar" class="btn btn-primary" value="Guardar">
                <button type="button" class="btn btn- secondary btn-danger" data-dismiss="modal" name="button">Cerrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Abrir modal -->
  <?php if (!isset($_POST['buscar'])): ?>
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && $errores != ""): ?>

      <script type="text/javascript">
      $("#agregar").modal("show");
      </script>

    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
