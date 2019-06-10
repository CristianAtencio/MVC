<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revision - Revision de Equipos</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center"><strong>Informacion de Equipos</strong></h1>

        <form action="<?php echo constant('URL'); ?>input/revisionItem/<?php echo $this->item->id; ?>" method="post">
            <h3><strong>Datos de equipo:</strong></h3>  
            <div class="form-group row">
            <div class="form-group col">
              <label for="equipo"><strong>Equipo: </strong></label>
              <label for="equipo"><?php echo $this->item->item; ?></label>
            </div>
            <div class="form-group col">
              <label for="causa"><strong>Causa de Ingreso: </strong></label>
              <label for="causa"><?php echo $this->item->cause; ?></label>
          </div>
          
          <div class="form-group">
            <label for="argumento"><strong>Motivos de Devolución: </strong></label>
            <label for="argumento"><?php echo $this->item->argument; ?></label>
          </div>

          <div class="form-group">
            <label for="observacion"><strong>Observaciones: </strong></label>
            <label for="observacion"><?php echo $this->item->observation; ?></label>
          </div> 
        </div>    
            <div class="form-group">
                <button type="submit" id="btn-save-item" class="btn btn-primary" >Guardar Revision</button>
            </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/item.js"></script>
</body>
</html>