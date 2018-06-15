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
  <title>Nuevo Proveedor</title>
</head>
<body>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="border">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" value="<?php echo $_SESSION['temp']['nombre'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" value="<?php echo $_SESSION['temp']['apellido'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Genero</label>
                <div class="form-group">

                  <!-- Si no a seleccionado genero -->
                  <?php if (!isset($_SESSION['temp']['genero'])  || $_SESSION['temp']['genero'] == '' ): ?>

                    <div class="form-check form-check-inline">
                      <input type="radio" name="genero" id="hombre" class="form-check-input" value="Hombre">
                      <label for="hombre" class="form-check-label">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="genero" id="mujer" class="form-check-input" value="Mujer">
                      <label for="mujer" class="form-check-label">Mujer</label>
                    </div>

                  <!-- Si ha seleccionado hombre le ponemos checked al input hombre -->
                  <?php elseif($_SESSION['temp']['genero'] == 'Hombre'): ?>

                    <div class="form-check form-check-inline">
                      <input checked type="radio" name="genero" id="hombre" class="form-check-input" value="Hombre">
                      <label for="hombre" class="form-check-label">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="genero" id="mujer" class="form-check-input" value="Mujer">
                      <label for="mujer" class="form-check-label">Mujer</label>
                    </div>

                  <!-- Si ha seleccionado mujer le ponemos checked al input mujer -->
                  <?php else: ?>

                    <div class="form-check form-check-inline">
                      <input type="radio" name="genero" id="hombre" class="form-check-input" value="Hombre">
                      <label for="hombre" class="form-check-label">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input checked type="radio" name="genero" id="mujer" class="form-check-input" value="Mujer">
                      <label for="mujer" class="form-check-label">Mujer</label>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="edad">Edad</label>
                  <input type="text" name="edad" id="edad" placeholder="Edad" class="form-control" value="<?php echo $_SESSION['temp']['edad'] ?>">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control" value="<?php echo $_SESSION['temp']['telefono'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="form-control" value="<?php echo $_SESSION['temp']['direccion'] ?>">
                </div>
              </div>
            </div>

            <!-- Errores -->
            <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && $errores != ""): ?>
              <div class="row justify-content-center">
                <div class="col-md-11 alert alert-danger">
                  <ul>
                    <?php echo $errores ?>
                  </ul>
                </div>
              </div>
            <?php endif; ?>

            <input type="submit" name="guardar" class="btn btn-primary" value="Guardar">
            <button type="button" class="btn btn- secondary btn-danger" data-dismiss="modal" name="button">Cerrar</button>
        </form>

      </div>

    </div>

  </div>



  <!-- Enlazamos los archivos js de bootstrap -->
  <script src="../../../js/popper.min.js"></script>
  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
</body>
</html>
