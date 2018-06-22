<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Bootstrap</title>
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                <a href="#" class="navbar-brand">Menu de navegacion</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="modulos/clientes/index.php" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Inventario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                            <?php echo $_SESSION['usuario']['nombre']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($_SESSION['usuario']['tipo'] == 2):?>
                                <a href="modulos/configuracion" class="dropdown-item">Configuracion</a>
                            <?php endif?>

                            <a href="#" class="dropdown-item">Actualizar Informacion</a>
                            <div class="dropdown-divider"></div>
                            <a href="cerrar.session.php" class="dropdown-item">Cerrar session</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/sell.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Realizar venta</h5>
                <p class="card-text">Realizar venta del servicio al contado</p>
                <a href="#" class="btn btn-dark">Vender</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/people.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Registrar, editar y ver informacion de los clientes</p>
                <a href="/gerenciales/modulos/clientes/index.php" class="btn btn-dark">Acceder </a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/boxes.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Inventario</h5>
                <p class="card-text">Ver informacion de los productos en inventario</p>
                <a href="#" class="btn btn-dark">Acceder</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/report.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Reportes</h5>
                <p class="card-text">Imprimir reportes de ventas y de clientes</p>
                <a href="#" class="btn btn-dark">Acceder</a>
              </div>
            </div>
          </div>
        </div>


    </div>
    <!-- Enlazamos los archivos js de bootstrap -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
