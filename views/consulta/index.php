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
        <h1 class="center">This is the Consult Page</h1>
        
        <span><?php echo $this->mensaje; ?></span>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once 'models/alumno.php';
                    foreach ($this->alumnos as $row) {
                        $alumno = new Alumno();
                        $alumno = $row;
                ?>
                <tr>
                    <td><?php echo $alumno->matricula; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consulta/viewAlumno/' . $alumno->matricula; ?>" class="btn btn-success">Edit</a> | 
                    <a href="<?php echo constant('URL') . 'consulta/deleteAlumno/' . $alumno->matricula; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php 
                    }
                 ?>   
            </tbody>
        </table>
    </div>
    
    <?php require 'views/footer.php'; ?>
</body>
</html>