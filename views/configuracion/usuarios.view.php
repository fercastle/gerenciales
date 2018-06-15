<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
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
                        <h2>Lista de usuarios</h2>
                    </header>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Tipo usuario</th>
                                    <th>User name</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   foreach ($proveedores as $key => $prov):?>
                                    <tr>
                                        <td><?php echo $prov['idusuario']?></td>
                                        <td><?php echo $prov['nombreusuario'] ." ". $prov['apellidousuario']?></td>
                                        <td><?php echo $prov['telefonousuario']?></td>
                                        <td width="30%"><?php echo $prov['direccionusuario']?></td>
                                        <td><?php echo $tipo = ($prov['tipousuario'] == 1) ? "Estandar" : "Administrador" ?></td>
                                        <td><?php echo $prov['username']?></td>
                                        <td width="200px"><a href="actualizar.php?id=<?php echo $prov['idpro']?>"  class="btn btn-success btn-sm">Actualizar</a> <a href="eliminar.php?id=<?php echo $prov['idpro'];?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                                     </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuevo" name="button">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="modal fade" id="nuevo">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5>Nuevo Usuario</h5>
                    <button type="button" data-dismiss="modal" class="close" name="button"> <span>&times;</span> </button>
                  </div>

                  <form class="" action="index.html" method="post">
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombreusuario">Nombre</label>
                            <input type="text" name="nombreusuario" id="nombreusuario" class="form-control" placeholder="Nombre" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombreusuario">Apellido</label>
                            <input type="text" name="apellidousuario" id="apellidousuario" class="form-control" placeholder="Apellido" value="">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fechanacimiento" value="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <p>Genero</p>
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="hombre" name="generousuario" value="Hombre">
                              <label class="form-check-label" for="hombre">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="mujer" name="generousuario" value="Mujer">
                              <label class="form-check-label" for="mujer">Mujer</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" name="telefonousuario" value="">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="direccionusuario">Direccion</label>
                            <input type="text" class="form-control" id="direccionusuario" name="direccionusuario" value="">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label for="correousuario">Correo</label>
                            <input type="text" id="correousuario" name="correousuario" class="form-control" value="">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="tipousuario">Tipo de usuario</label>
                            <select class="form-control" name="tipousuario">
                              <option value="1">Estandar</option>
                              <option value="2">Administrador</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="username">Usuario</label>
                          <input type="text" class="form-control" name="username" id="username" value="">
                        </div>
                        <div class="col-md-4">
                          <label for="password">Contraseña</label>
                          <input type="text" class="form-control" name="password" id="password" value="">
                        </div>
                        <div class="col-md-4">
                          <label for="password1">Repetir Contraseña</label>
                          <input type="text" class="form-control" name="password1" id="password1" value="">
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <input type="submit" name="guardar" class="btn btn-primary" value="Guardar">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Cerrar</button>
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
</body>
</html>
