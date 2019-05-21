<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details Alumno</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center" >Details Alumno</h1>
        <span><?php echo $this->mensaje; ?></span>
        <form action="<?php echo constant('URL') . 'consulta/updateAlumno';  ?>" method="post">
            <div class="form-group">
              <label for="matricula">Matricula</label>
              <input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo $this->alumno->matricula; ?>" aria-describedby="helpId" disabled>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $this->alumno->nombre; ?>" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $this->alumno->apellido; ?>" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Alumno</button> | 
                <a class="btn btn-success" href="<?php echo constant('URL') . 'consulta';?>">Back</a>
            </div>
        </form>
    </div>
    
    <?php require 'views/footer.php'; ?>
</body>
</html>