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
    input[type="file"]{
      display: none;
    }
  </style>
  <title>Editar Servicio</title>
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
                    <a href="../clientes/index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                       </a>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <header class="encabezado col-md-12">
                        <h2>Editar servicio</h2>
                    </header>
                </div>
                <form class="border" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nombre">Nombre porducto</label>
                        <input type="text" name="nombre_producto" id="nombre" placeholder="Nombre de producto" class="form-control" value="<?php echo $_SESSION['temp']['nombre_producto'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="precioc">Precio compra</label>
                        <input type="text" name="precio_compra" id="precioc" placeholder="Precio compra" class="form-control" value="<?php echo $_SESSION['temp']['precio_compra'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="preciov">Precio venta</label>
                      <input type="text" class="form-control" name="precio_venta" id="preciov" value="<?php echo $_SESSION['temp']['precio_venta']?>" placeholder="Precio de venta">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="pais">Proveedores</label>
                        <select name="idproveedor" id="proveedor" class="form-control">
                          <?php foreach ($proveedores as $key => $proveedor): ?>
                            <option value="<?php echo $proveedor['idproveedor'] ?>"><?php echo $proveedor['nombre_proveedor'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>

                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control" value="<?php echo $_SESSION['temp']['descripcion'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 input-file">
                      <label for="picture" class="btn btn-success ">Agregar Foto</label>
                      <input type="file" name="foto" id="picture" value="" accept="image/*">
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
