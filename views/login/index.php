<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Sign in - Ingreso de Equipos</title>

    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body>
  <div class="login container col-md-4 d-flex w-100 h-500 p-4 mx-auto flex-column">
        
    <form class="form-signin" action="<?php echo constant('URL'); ?>login" method="POST">
      <div class="center">
          <img src="<?php echo constant('URL'); ?>assets/img/logo.jpg" alt="" width="122" height="122">
         <h1 class="h3 mb-3 font-weight-normal">Please, type you credentials</h1>
      </div>
       <div class="form-group">
         <label for="inputUser">User</label>
         <input type="text" name="inputUser" id="inputUser" value="Triton" class="form-control" placeholder="">
       </div>
       <div class="form-group">
         <label for="inputPassword">Password</label>
         <input type="password" name="inputPassword" id="inputPassword" value="Jgiraldo02" class="form-control" placeholder="">   
       </div>
       <div class="form-group">
          <p class="mt-5 mb-3 alert-danger" style ="color: red;"><?php echo $this->mensaje; ?></p>
          <br/>
          <button class="btn btn-lg btn-primary btn-block" type="submit" id="enviar" name="enviar">Sign in</button>
        </div>
          <p class="center mt-5 mb-3 text-muted">&copy; Atencio <?php echo date('Y');?></p>
    </form>
  </div>
</body>
</html>