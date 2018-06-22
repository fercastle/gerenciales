<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <title>Bootstrap</title>
</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                <a href="#" class="navbar-brand">Menu de navegacion</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../../../" class="nav-link">Inicio</a>
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
    </div>
    <div class="container">
      <br>
        <div class="row justify-content-center">

          <div class=" col-md-8 alert alert-info">
            <h3>Informacion del usuario</h3>
            <div class="row">
              <div class="col-md-12">
                <p> <b>Nombre: </b> <?php echo $usuario['nombreusuario'] ." ". $usuario['apellidousuario'] ?> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <p> <b>Fecha de Nacimiento </b> <?php echo $usuario['fechanacimiento'] ?> </p>
              </div>
              <div class="col-md-3">
                <p> <b>Genero </b> <?php echo $usuario['generousuario'] ?> </p>
              </div>
              <div class="col-md-4">
                <p> <b>Telefono </b> <?php echo $usuario['telefonousuario'] ?> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p> <b>Direccion: </b> <?php echo $usuario['direccionusuario'] ?> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <p> <b>Correo: </b> <?php echo $usuario['correousuario'] ?> </p>
              </div>
              <div class="col-md-4">
                <p> <b>Tipo usuario: </b> <?php echo $var = ($usuario['tipousuario'] = 1) ? "Estandar" : "Administrador" ?> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p> <b>Nombre de usuario: </b> <?php echo $usuario['username'] ?> </p>
              </div>
            </div>
            <div class="row justify-content-center">
              <a href="actualizar.php?id=<?php echo $usuario['idusuario'] ?>" class="btn btn-success">Actualizar informacion</a>
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
