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
                                    <th>Apellido</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>genero</th>
                                    <th>Correo</th>
                                    <th>Tipo usuario</th>
                                    <th>User name</th>
                                    <th>Password</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   foreach ($proveedores as $key => $prov):?>
                                    <tr>
                                        <td><?php echo $prov['idusuario']?></td>
                                        <td><?php echo $prov['nombreusuario']?></td>
                                        <td><?php echo $prov['apellidousuario']?></td>
                                        <td><?php echo $prov['fechanacimiento']?></td>
                                        <td><?php echo $prov['telefonousuario']?></td>
                                        <td><?php echo $prov['direccionusuario']?></td>
                                        <td><?php echo $prov['generousuario']?></td>
                                        <td><?php echo $prov['correousuario']?></td>
                                        <td><?php echo $prov['tipousuario']?></td>
                                        <td><?php echo $prov['username']?></td>
                                        <td><?php echo $prov['password']?></td>
                                        <td width="200px"><a href="actualizar.php?id=<?php echo $prov['idpro']?>"  class="btn btn-success btn-sm">Actualizar</a> <a href="eliminar.php?id=<?php echo $prov['idpro'];?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                                     </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                        <a href="nuevo.php?id='nuevo'" class="btn btn-primary btn-lg">Nuevo</a>
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
