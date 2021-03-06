<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
      .footer-bottom {
        position: fixed;
        bottom: 0;
        right: 0;
        background-color: #000000;
        min-height: 30px;
        width: 100%;
      }
      .copyright {
        color: #fff;
        line-height: 30px;
        min-height: 30px;
        text-align: center;
        padding: 7px 0;
      }
    </style>
    <title>Inicio</title>
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                <a href="#" class="navbar-brand">Funeraria "Manantiales de Vida"</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="modulos/clientes/index.php" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="modulos/inventario" class="nav-link">Inventario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                            <?php echo $_SESSION['usuario']['nombre']?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($_SESSION['usuario']['tipo'] == 2):?>
                                <a href="modulos/configuracion" class="dropdown-item">Configuracion</a>
                            <?php endif?>

                            <a href="modulos/configuracion/usuarios/actualizar.php?id=<?php echo $_SESSION['usuario']['id'] ?>" class="dropdown-item">Actualizar Informacion</a>
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
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <img class="card-img-top" src="img/sell.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Realizar venta</h5>
                <p class="card-text">Realizar venta del servicio al contado</p>
                <a href="modulos/ventas/index.php" class="btn btn-dark">Vender</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <img class="card-img-top" src="img/people.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Registrar, editar y ver informacion de los clientes</p>
                <a href="/gerenciales/modulos/clientes/index.php" class="btn btn-dark">Acceder </a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <img class="card-img-top" src="img/boxes.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Inventario</h5>
                <p class="card-text">Ver informacion de los productos en inventario</p>
                <a href="/gerenciales/modulos/inventario/index.php" class="btn btn-dark">Acceder</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
              <img class="card-img-top" src="img/report.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Reportes</h5>
                <p class="card-text">Imprimir reportes de ventas y de clientes</p>
                <a href="modulos/reportes/index.php" class="btn btn-dark">Acceder</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="footer-bottom">
	     <div class="container">
		       <div class="row">
			          <div class="col-md-12">
				              <div class="copyright">
					              © 2018, Funeraria "Manantiales de vida", All rights reserved
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
