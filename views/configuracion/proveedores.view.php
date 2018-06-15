<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/03-grid.css">
    <title>Select</title>
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
                      <a href="#" class="nav-link">Tienda</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">Inventario</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                          Luis Hernandez                        </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                          <a href="#" class="dropdown-item">Configuracion</a>
                                                      <a href="#" class="dropdown-item">Actualizar Informacion</a>
                          <div class="dropdown-divider"></div>
                          <a href="cerrar.session.php" class="dropdown-item">Cerrar session</a>
                      </div>
                  </li>
              </ul>
          </div>
      </header>
      </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <header class="encabezado col-md-12">
                  <h2>Lista proveedores</h2>
                </header>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Descripcion</th>
                        <th>Fecha/Registro</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php   foreach ($proveedores as $key => $prov):?>
                        <tr>
                          <td><?php echo $prov['idproveedor']?></td>
                          <td><?php echo $prov['nombre_proveedor']?></td>
                          <td><?php echo $prov['direccion_proveedor']?></td>
                          <td><?php echo $prov['telefono_proveedor']?></td>
                          <td><?php echo $prov['correo_proveedor']?></td>
                          <td><?php echo $prov['descripcion_proveedor']?></td>
                          <td><?php echo $prov['fecha_registroprov']?></td>
                          <td width="200px"><a href="actualizar.php?id=<?php echo $prov['idproveedor']?>"  class="btn btn-success btn-sm">Actualizar</a> <a href="eliminar.php?id=<?php echo $prov['idproveedor'];?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                        </tr>
                      <?php endforeach?>
                    </tbody>
                  </table>
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo" name="button"> Nuevo </button> -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana">Mostrar</button>

                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="container">
      <div class="row">
        <div class="modal fade" id="ventana" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Titulo de la ventana</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times</span></button>
              </div>
              <div class="modal-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, quasi maiores explicabo, nihil eligendi nisi facilis, assumenda aliquam architecto ut dicta. Quasi distinctio temporibus voluptas?</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-primary">Informacion</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Enlazamos los archivos js de bootstrap -->
    <script type="../../js/popper.min"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>
</html>
