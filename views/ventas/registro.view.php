<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <title>Registro</title>
  <style media="screen">
    body{
      background: #e2e2e2;
    }
    .header{
      margin-top: 10px;
      border: 1px solid black;
      padding: 10px;
      padding-bottom: 2px;
      border-radius: 5px 5px 0px 0px;
      background: #fff;
    }
    .body, .footer{
      padding: 10px;
      border: solid 1px black;
      background: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="header">
          <h3>Funeraria manantiales de vida</h3>
          <p>Col. Santa Lusia Casa N11, San Miguel</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="body">
          <p><b>Cliente: </b> <?php echo $cliente['nombre_cliente'] ?></p>
          <p> <b>Direccion: </b> <?php echo $cliente['direccion_cliente'] ?> </p>
          <hr>
          <p> <b>Servicio contratado: </b> <?php echo $total_venta[0]['nombre_producto'] ?> </p>
          <p> <b>Descripcion: </b> <?php echo $total_venta[0]['descripcion'] ?></p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="footer">
          <p><b>Vendedor: </b> <?php echo $_SESSION['usuario']['nombre'] ?></p>
          <p><b>Fecha: </b> <?php echo $fechaFactura ?></p>
          <div class="ml-auto">
            <p class=""> <b>Total: </b> <?php echo $precio ?>$ </p>
          </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-10">
      <br>
      <a href="../../index.php" class="btn btn-primary">Aceptar</a>
      <a href='javascript:window.print(); void 0;' class="btn btn-info">Imprimir</a>
    </div>
  </div>
  <div class="modal fade" id="aceptar">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registro</h5>
        </div>
        <div class="modal-body">
          <p>El registro se realizo con exito</p>
        </div>
        <div class="modal-footer">
          <a href="../../index.php" class="btn btn-primary">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript">
    $("#aceptar").modal("show");
    </script> -->

</body>
</html>
