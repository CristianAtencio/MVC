<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresos - Ingreso de Equipos</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center"><strong>Nuevo Ingreso</strong></h1>

        <form action="<?php echo constant('URL'); ?>input/ingresarItem" method="post">
          <div class="form-group">
            <h3><strong>Datos de cliente:</strong></h3>  
            <div class="form-group">
              <label for="ncliente">Nombre o Razón social</label>
              <input type="text" name="ncliente" id="ncliente" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="nitcliente">NIT</label>
              <input type="text" name="nitcliente" id="nitcliente" class="form-control" placeholder="" aria-describedby="helpId" require>
            </div>
            <div class="form-group">
              <label for="correocliente">Correo</label>
              <input type="text" name="correocliente" id="correocliente" class="form-control" placeholder="" aria-describedby="helpId" require>
            </div>
            <div class="form-group row">
              <div class="form-group col">
                <label for="contactocliente">Contacto</label>
                <input type="text" name="contactocliente" id="contactocliente" class="form-control" placeholder="" aria-describedby="helpId" require>
              </div>
              <div class="form-group">
                <label for="telcliente">Teléfono</label>
                <input type="text" name="telcliente" id="telcliente" class="form-control" placeholder="" aria-describedby="helpId" require>
              </div>
            </div>  
          </div>
          <div class="form-group">
            <h3><strong>Datos de equipo:</strong></h3>  
            <div class="form-group row">
            <div class="form-group col">
              <label for="equipo">Equipo</label>
              <select class="form-control" name="equipo" id="equipo" require>
                <option disabled selected >Seleccione el equipo</option>
                <option value="Motor">Motor</option>
                <option value="Reductor">Reductor</option>
                <option value="Motoreductor">Motoreductor</option>
                <option value="Motofreno">Motofreno</option>
                <option value="Variador">Variador</option>
                <option value="Polipasto">Polipasto</option>
                <option value="Pantalla">Pantalla</option>
                <option value="Otro">Otro</option>
              </select>
              <small id="validateEquipo" ></small>
            </div>
            <div class="form-group col">
              <label for="causa">Causa de Ingreso:</label>
              <select class="form-control" name="causa" id="causa" require>
                <option disabled selected >Seleccione la causa</option>
                <option value="Calidad">Calidad</option>
                <option value="Despacho">Despacho</option>
                <option value="Servicio">Servicio</option>
                <option value="Daño">Daño</option>
                <option value="Factura">Factura</option>
                <option value="Otro">Otro</option>
              </select>
              <small id="validateCausa" ></small>             
            </div>
          </div>
          
          <div class="form-group">
            <label for="argumento">Motivos de Devolución</label>
            <textarea class="form-control" name="argumento" id="argumento" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="observacion">Observaciones</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3"></textarea>
          </div>  
        </div>    
            <div class="form-group">
                <button type="submit" id="btn-save-item" class="btn btn-primary" >Guardar Ingreso</button>
            </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/item.js"></script>
</body>
</html>