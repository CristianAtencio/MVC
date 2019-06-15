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

        
        <form action="<?php echo constant('URL'); ?>input/revisionItem/<?php echo $this->item->id; ?>" method="post" enctype="multipart/form-data">
            <h3><strong>Datos de Revisión:</strong></h3>     
            <div class="form-group">
              <label for="modelo"><strong>Modelo: </strong></label>
              <label for="modelo"><?php echo $this->item->model; ?></label>
            </div>
            <div class="form-group">
              <label for="voltaje"><strong>Voltaje: </strong></label>
              <label for="voltaje"><?php echo $this->item->voltage; ?></label>
            </div>
            <div class="form-group">
              <label for="potencia"><strong>Potencia: </strong></label>
              <label for="potencia"><?php echo $this->item->power; ?></label>
            </div>
            <div class="form-group">
              <label for="serial1"><strong>Serial 1: </strong></label>
              <label for="serial2"><?php echo $this->item->serial1; ?></label>
            </div>
            <div class="form-group">
              <label for="serial2"><strong>Serial 2: </strong></label>
              <label for="serie2"><?php echo $this->item->serial2; ?></label>
            </div>
          
          <div class="form-group">
            <label for="causa2"><strong>Causas en Revisión: </strong></label>
            <label for="causa2"><?php echo $this->item->cause2; ?></label>
            </div> 
          <div class="form-group">
            <label for="observacion2"><strong>Observaciones de Revisión: </strong></label>
            <label for="observacion2"><?php echo $this->item->observation2; ?></label>
          </div>
          <div class="form-group">
            <label for="piezas"><strong>Piezas a cambiar: </strong></label>
            <label for="piezas"><?php echo $this->item->parts; ?></label>
        </div> 
        <?php if ((strcmp($this->role, "ADMINISTRATOR") === 0) || (strcmp($this->role, "SELLER") === 0)) { ?> 
        <form action="<?php echo constant('URL'); ?>input/revisionFinished/<?php echo $this->item->id; ?>" method="post">
          <div class="form-group">
                <button type="submit" id="btn-save-item" class="btn btn-primary" >Terminar Revision</button>
            </div>
        </form>
        <?php }?>
          </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/item.js"></script>
</body>
</html>