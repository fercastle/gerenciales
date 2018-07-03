<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Enlazar css de bootstrap -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <title>Registro</title>
</head>
<body>
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

    <script type="text/javascript">
    $("#aceptar").modal("show");
    </script>

</body>
</html>
