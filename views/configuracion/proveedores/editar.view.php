<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <style media="screen">
    form{
      padding: 20px;
      margin-top: 20px;
    }
  </style>
  <title>Editar Proveedor</title>
</head>
<body>
  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Menu de navegacion</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../../../index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="../../clientes/index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a href="../" class="dropdown-item">Configuracion</a>
                                                    <a href="../usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
                        <div class="dropdown-divider"></div>
                        <a href="../../../cerrar.session.php" class="dropdown-item">Cerrar session</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <header class="encabezado col-md-12">
                        <h2>Editar informacion de proveedor</h2>
                    </header>
                </div>
                <form class="border" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre_proveedor" placeholder="nombre" id="nombre" class="form-control" value="<?php echo $_SESSION['temp']['nombre_proveedor'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion_proveedor" placeholder="Direccion" id="direccion" class="form-control" value="<?php echo $_SESSION['temp']['direccion_proveedor'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="text" name="correo_proveedor" placeholder="Correo" id="correo" class="form-control" value="<?php echo $_SESSION['temp']['correo_proveedor'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono_proveedor" placeholder="telefono" id="telefono" class="form-control" value="<?php echo $_SESSION['temp']['telefono_proveedor'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" placeholder="Descripion" name="descripcion_proveedor" value="<?php echo $_SESSION['temp']['descripcion_proveedor']?>" id="descripcion" class="form-control">
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
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../../js/popper.min.js"></script>
  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
</body>
</html>
