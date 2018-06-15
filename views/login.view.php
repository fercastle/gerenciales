<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlazamos css de bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style media="screen">
        form{
            padding: 20px;
            margin-top: 20px;
        }
    </style>
    <title>Ejercicio1</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="border">
                    <h3>Iniciar sesión</h3>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="usuario" placeholder="usuario" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="contraseña">contraseña</label>
                            <input type="password" id="contraseña" name="pass" placeholder="contraseña" class="form-control">
                    </div>
                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="terminos">
                        <label for="terminos" class="form-check-label">Recordarme</label>
                    </div> -->
                    <div class="from-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesion" name="iniciar">
                    </div>
                    <br>
                    <?php if($_SERVER['REQUEST_METHOD'] == 'POST' and $errores != ""):?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php echo $errores;?>
                        </ul>
                    </div>
                    <?php endif?>
                </form>
            </div>
        </div>
    </div>
    <!-- Enlazamos los archivos js de bootstrap -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>