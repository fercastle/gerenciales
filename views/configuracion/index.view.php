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
        <a href="proveedores/index.php">Proveedores</a>
        <a href="usuarios.php" class="btn btn-primary">Usuarios</a>
    </div>
    <!-- Enlazamos los archivos js de bootstrap -->
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
