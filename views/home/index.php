<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Ingreso de Equipos</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div id="items">
        <h1 class="center"><strong>Nuevo Ingreso</strong></h1>
        <div class="row d-flex justify-content-center">
            <table class="table col-10">
                <thead class="thead-light text-center">
                    <tr>
                    <th scope="col" width="15%">#</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Causa</th>
                    <th scope="col">Motivos</th>
                    <th scope="col">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        include_once 'models/item.php';
                        foreach ($this->items as $row) {
                            $item = new Item();
                            $item = $row;
                    ?>
                    <tr id="<?php echo $item->item; ?>">
                    <th scope="row"><a href="<?php echo constant('URL'); ?>input/item/<?php echo $item->id; ?>">
                    <img src="<?php echo constant('URL'); ?>assets/img/item.svg" width="100%" height="auto" alt="Equipo ingresado"/>
                    </a></th>
                    
                    <td><?php echo $item->item; ?></td>
                    <td><?php echo $item->cause; ?></td>
                    <td><?php echo $item->argument; ?></td>
                    <td><?php echo $item->observation; ?></td>
                    </tr>
                    <?php 
                        }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>        
    <?php require 'views/footer.php'; ?>
</body>
</html>