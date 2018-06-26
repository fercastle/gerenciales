<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <title>Clientes</title>
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
                <li class="nav-item active">
                    <a href="#" class="nav-link">Clientes</a>
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
      <header class="caja offset-1 col-md-12">
        <br>
        <h2>Lista de clientes</h2>
      </header>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 mb-3">
        <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="input-group">
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar servicio" aria-describedby="inputGroupPrepend" required>
            <div class="input-group-prepend">
              <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>

              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($clientes != ""): ?>
              <?php foreach ($clientes as $key => $cliente): ?>
                <tr>
                  <td width="5%"><?php echo $cliente['idcliente'] ?></td>
                  <td width="25%"> <a href="informacion.php?id=<?php echo $cliente['idcliente'] ?>"><?php echo $cliente['nombre_cliente']." ".$cliente['apellidos_cliente']?></a> </td>
                  <td width="45%" ><?php echo $cliente['direccion_cliente'] ?></td>
                  <td width="10%"><?php echo $cliente['tel_cliente'] ?></td>
                  <td width="10%"><a href="editar.php?id=<?php echo $cliente['idcliente'] ?>" class="btn btn-success btn-sm">Editar</a></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td>
                <div  class="alert alert-danger" role="alert">
                  No se encontraron coincidencias con el cliente ingresado!
                </div>
                </td>
              </tr>
            <?php endif; ?>

          </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo" name="button"> Nuevo </button>
      </div>
    </div>
    <!-- Modal -->
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="nuevo" tabindex="-1" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Nuevo cliente</h5>
                <button type="button" name="button" class="close" data-dismiss="modal"><span>&times;</span></button>
              </div>
              <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" value="<?php echo $_SESSION['temp']['nombre'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" value="<?php echo $_SESSION['temp']['apellido'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="apellido">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="direccion" class="form-control" value="<?php echo $_SESSION['temp']['direccion'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Telefono</p>
                                <input type="text" name="telefono" placeholder="telefono" id="telefono" class="form-control" value="<?php echo $_SESSION['temp']['telefono'] ?>">
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
  </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Abrir modal -->
  <?php if (!isset($_POST['buscar'])): ?>
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && $errores != ""): ?>

      <script type="text/javascript">
      $("#nuevo").modal("show");
      </script>

    <?php endif; ?>
  <?php endif; ?>

</body>
</html>
