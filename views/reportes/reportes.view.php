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
      justify-content:center;
    }
    .producto{
      margin: 1%;
    }
  </style>
  <title>Servicios</title>
</head>
<body>

  <div class="container-fluid">
    <header class="row">
        <div class="navbar navbar-expand navbar-dark bg-dark col-md-12">
            <a href="#" class="navbar-brand">Funeraria "Manantiales de Vida"</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="../clientes/index.php" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="../inventario/index.php" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="botton" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']['nombre']?>                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php if($_SESSION['usuario']['tipo'] == 2):?>
                          <a href="../configuracion/index.php" class="dropdown-item">Configuracion</a>
                      <?php endif?>
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
    <div class="row">
      <header class="col-md-12 offset-1">
        <h2>Reportes de venta</h2>
      </header>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table">
          <thead class="thead-dark">
            <th>id</th>
            <th>Cliente</th>
            <th>Valor de compra</th>
            <th>Servicio</th>
            <th>Vendedor</th>
            <th>Fecha</th>
          </thead>
          <tbody>
            <?php foreach ($facturas as $key => $factura): ?>
              <tr>
                <td><?php echo $factura['idfactura'] ?></td>
                <td><?php echo $factura['nombre_cliente']?></td>
                <td><?php echo $factura['total_venta']?></td>
                <td><?php echo $factura['nombre_producto']?></td>
                <td><?php echo $factura['username']?></td>
                <td><?php echo mostrarFecha($factura['fecha_factura'])?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
