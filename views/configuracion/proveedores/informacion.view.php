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
  <title>Informacion Proveedor</title>
</head>
<body>

  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Funeraria "Manantiales de Vida"</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../../../index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="../../clientes/index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="../../inventario/index.php" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php if($_SESSION['usuario']['tipo'] == 2):?>
                          <a href="modulos/configuracion" class="dropdown-item">Configuracion</a>
                      <?php endif?>
                         <a href="../usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
                        <div class="dropdown-divider"></div>
                        <a href="../../../cerrar.session.php" class="dropdown-item">Cerrar session</a>
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
            <h3>Informacion de proveedor</h3>
            </header>

          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <p> <b>Nombre</b> <?php echo $proveedor['nombre_proveedor']?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Direccion</b> <?php echo $proveedor['direccion_proveedor'] ?> </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p> <b>correo</b> <?php echo $proveedor['correo_proveedor']?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>telefono</b> <?php echo $proveedor['telefono_proveedor']?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>Fecha</b> <?php echo mostrarFecha($proveedor['fecha_registroprov']) ?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Descripcion</b> <?php echo $proveedor['descripcion_proveedor'] ?> </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p> <b>Registrado por: </b> <?php echo $proveedor['username'] ?>
            </div>
          </div>
          <div class="row justify-content-center">
            <a href="editar.php?id=<?php echo $proveedor['idproveedor'] ?>" class="btn btn-success">Actualizar informacion</a>
          </div>
        </div>
    </div>
  </div>



  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../../js/popper.min.js"></script>
  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
</body>
</html>
