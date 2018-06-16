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
  <title>Editar cliente</title>
</head>
<body>
  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Menu de navegacion</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Tienda</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        Luis Hernandez                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a href="../" class="dropdown-item">Configuracion</a>
                                                    <a href="#" class="dropdown-item">Actualizar Informacion</a>
                        <div class="dropdown-divider"></div>
                        <a href="../../../cerrar.session.php" class="dropdown-item">Cerrar session</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <header class="encabezado col-md-12">
                        <h2>Actualizar cliente</h2>
                    </header>
                </div>
                <form class="border" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre_cliente" id="nombre" placeholder="Nombre" class="form-control" value="<?php echo $_SESSION['temp']['nombre_cliente'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellidos_cliente" id="apellido" placeholder="Apellido" class="form-control" value="<?php echo $_SESSION['temp']['apellidos_cliente'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="apellido">Direccion</label>
                        <input type="text" name="direccion_cliente" id="direccion" placeholder="direccion" class="form-control" value="<?php echo $_SESSION['temp']['direccion_cliente'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Telefono</p>
                                <input type="text" name="tel_cliente" placeholder="telefono" id="telefono" class="form-control" value="<?php echo $_SESSION['temp']['tel_cliente'] ?>">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $errores != ""): ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php echo $errores;?>
                                    </ul>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
                      </div>
                    </div>

                </form>
            </div>
        </div>
          </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
