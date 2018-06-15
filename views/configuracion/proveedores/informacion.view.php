<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <style media="screen">
    form{
      padding: 20px;
      margin-top: 20px;
    }
  </style>
  <title>Clientes</title>
</head>
<body>

  <div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-8 alert alert-info">

          <div class="row">
            <div class="col-md-12">
              <p> <b>Nombre</b> <?php echo $cliente['nombre'] ." ". $cliente['apellido'] ?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <p> <b>Genero</b> <?php echo $cliente['genero'] ?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>Edad</b> <?php echo $cliente['edad'] . " Años" ?> </p>
            </div>
            <div class="col-md-4">
              <p> <b>Telefono</b> <?php echo $cliente['telefono'] ?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Direccion</b> <?php echo $cliente['direccion'] ?> </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p> <b>Fecha de registro</b> <?php echo mostrarFecha($cliente['fecha']) ?> </p>
            </div>
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
