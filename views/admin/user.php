<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Administrador - Nuevo usuario</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center"><strong>Nuevo Usuario</strong></h1>

        <form action="<?php echo constant('URL'); ?>admin/create" method="post">
          <div class="form-group">
            <h3><strong>Datos de usuario:</strong></h3>  
            <span style="color:red"><?php echo $this->userExist; ?></span>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="correo">Correo</label>
              <input type="text" name="correo" id="correo" class="form-control" placeholder="" aria-describedby="helpId" required>
              <small id="validateEmail"></small>
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="rol">Rol:</label>
              <select class="form-control" name="rol" id="rol" required>
                <option disabled selected >Seleccione un rol</option>
                <option value=1>Administrador</option>
                <option value=2>Almacen</option>
                <option value=3>Taller</option>
                <option value=4>Ventas</option>
                <option value=5>Usuario</option>
              </select> 
              <small id="validateRole"></small>          
            </div>
            <div class="form-group">
                <label for="usuario">User</label>
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="" aria-describedby="helpId" required>
                <small id="validateUser" ></small>
            </div>
              <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" name="clave" id="clave" class="form-control" placeholder="" aria-describedby="helpId" required>
              </div>
              <div class="form-group">
                <label for="confirmacion">Confirmar contraseña</label>
                <input type="password" name="confirmacion" id="confirmacion" class="form-control" placeholder="" aria-describedby="helpId" required>
                <small id="validateConfirm"></small>
              </div> 
        </div>    
            <div class="form-group">
                <button type="submit" id="btn-save-user" class="btn btn-primary">Guardar Usuario</button>
            </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/admin.js"></script>
</body>
</html>