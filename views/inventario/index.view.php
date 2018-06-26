<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <style media="screen">
    .inventario{
      display: flex;
      flex-direction: row;
      justify-content:
    }
    .producto{
      margin: 1%;
    }
  </style>
  <title>Productos</title>
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
                <li class="nav-item dropdown active">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">Inventario</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="index.php" class="dropdown-item">Ver inventario</a>
                        <a href="nuevo.php" class="dropdown-item">Agregar nuevo servicio</a>
                    </div>
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
    <br>
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


    <div class="row justify-content-center inventario">
      <?php if ($productos != ""): ?>
        <?php foreach ($productos as $key => $producto): ?>
          <div class="producto">
            <div class="card" style="width: 14rem;">
              <img class="card-img-top" src="<?php echo $var = ($producto['foto'] != null ) ? $producto['foto'] : '../../img/inventario/default.jpg' ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $producto['nombre_producto'] ?></h5>
                <p class="card-text">$<?php echo $producto['precio_venta']  ?></p>
                <a href="informacion.php?id=<?php echo $producto['idproducto'] ?>" class="btn btn-primary">Ver informacion</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="row justify-content-center error">
          <div class="col-md-12 ">
            <div  class="alert alert-danger" role="alert">
              No se encontraron coincidencias con el producto ingresado!
            </div>
          </div>
        </div>

      <?php endif; ?>



      <!-- <div class="producto">
        <div class="card" style="width: 14rem;">
          <img class="card-img-top" src="../../img/inventario/foto.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Super Presidente super sayajin</h5>
            <p class="card-text">$1,200</p>
            <a href="#" class="btn btn-primary">Ver informacion</a>
          </div>
        </div>
      </div>

      <div class="producto">
        <div class="card" style="width: 14rem;">
          <img class="card-img-top" src="../../img/inventario/foto.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Super Presidente super sayajin</h5>
            <p class="card-text">$1,200</p>
            <a href="#" class="btn btn-primary">Ver informacion</a>
          </div>
        </div>
      </div>

      <div class="producto">
        <div class="card" style="width: 14rem;">
          <img class="card-img-top" src="../../img/inventario/foto.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Super Presidente super sayajin</h5>
            <p class="card-text">$1,200</p>
            <a href="#" class="btn btn-primary">Ver informacion</a>
          </div>
        </div>
      </div>

      <div class="producto">
        <div class="card" style="width: 14rem;">
          <img class="card-img-top" src="../../img/inventario/foto.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Super Presidente super sayajin</h5>
            <p class="card-text">$1,200</p>
            <a href="#" class="btn btn-primary">Ver informacion</a>
          </div>
        </div>
      </div>

      <div class="producto">
        <div class="card" style="width: 14rem;">
          <img class="card-img-top" src="../../img/inventario/foto.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Super Presidente super sayajin</h5>
            <p class="card-text">$1,200</p>
            <a href="#" class="btn btn-primary">Ver informacion</a>
          </div>
        </div>
      </div> -->

    </div>


  </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
