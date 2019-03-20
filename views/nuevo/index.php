<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">This is the New Page</h1>

        <form action="<?php echo constant('URL'); ?>nuevo/registrarAlumno" method="post">
            <div class="form-group">
              <label for="matricula">Matricula</label>
              <input type="text" name="matricula" id="matricula" class="form-control" placeholder="" aria-describedby="helpId" required>

            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
              
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId" required>
              
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Matricula y Alumno</button>
            </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>