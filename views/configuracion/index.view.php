<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Configuracion</title>
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                <a href="#" class="navbar-brand">Menu de navegacion</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../../" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../modulos/clientes/index.php" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="/gerenciales/modulos/inventario/index.php" class="nav-link">Inventario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                            <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            <a href="#" class="dropdown-item">Configuracion</a>
                                                        <a href="usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
                            <div class="dropdown-divider"></div>
                            <a href="cerrar.session.php" class="dropdown-item">Cerrar session</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Opciones del menu -->
        <br>
        <div class="row justify-content-center">

          <!-- Agregamos una tarjeta "card" es otro componente de bootstrap -->
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="../../img/industry.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Proveedores</h5>
                <p class="card-text">Permite ver, registrar y modificar la informacion de los proveedores</p>
                <a href="proveedores/index.php" class="btn btn-primary">Acceder</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="../../img/users.png" width="180" height="180" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">Permite ver, registrar y modificar la informacion de los usuarios</p>
                <a href="usuarios/" class="btn btn-primary">Acceder</a>
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
