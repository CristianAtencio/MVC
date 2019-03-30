<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="header">
        <ul >
            <li><a href="<?php echo constant('URL'); ?>"><img src="<?php echo constant('URL'); ?>assets/img/Logo Giravan.jpg" alt="" width="100"></a></li>
            <li><a href="<?php echo constant('URL'); ?>main">Home</a></li>
            <li><a href="<?php echo constant('URL'); ?>nuevo">New</a></li>
            <li><a href="<?php echo constant('URL'); ?>consulta">Consult</a></li>
            <li><a href="<?php echo constant('URL'); ?>ayuda">Help</a></li>
                <!-- <ul class="menu">
                    <li><a href="#">Administrator</a></li>
                    <li><a href="#">Admin Users</a></li>
                    <li><a href="#">Log out</a></li>
                </ul> </li>
        </ul>-->
                
            
            <li class="nav-item dropdown" id="menuAccount">
              <a class="nav-link dropdown-toggle rounded float-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->user;?>
              </a>
              <div id="menu" class="dropdown-menu dropdown-menu-right bg-info text-white" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-white" href="#">Administrator</a>
                <a class="dropdown-item text-white" href="#">Admin User</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-white" href="<?php echo constant('URL'); ?>login">Log out</a>
              </div>
            </li>
            </ul> 
     </div>
     <!-- <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav> -->
</body>
</html>

<script type="text/javascript" src="<?php echo constant('URL'); ?>public/node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL'); ?>public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>