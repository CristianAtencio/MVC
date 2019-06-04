<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Administrador</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <div>
        <h1 class="center"><strong>Administrador de usuarios</strong></h1>
        <div id="user" class="col-10">
            <a name="btnCreate" id="btnCreate" class="btn btn-primary" href="<?php echo constant('URL'); ?>admin/user" role="button">Crear nuevo usuario</a>
            <div class="row d-flex justify-content-center pt-2">
                <table class="table text-center">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            include_once 'models/item.php';
                            $i = 1;
                            foreach ($this->users as $row) {
                                $user = new User();
                                $user = $row;
                        ?>
                        <tr id="user-<?php echo $user->user; ?>">
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $user->firstName . " " .$user->lastName; ?></td>
                        <td><?php echo $user->departament; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->user; ?></td>
                        <td><?php echo $user->role; ?></td>
                        <td>
                            <a name="btnEdit" id="btnEdit" class="btn btn-warning" href="<?php echo constant('URL'); ?>admin/detail/<?php echo $user->user; ?>" role="button">Edit</a>
                            <a name="btnDelete" id="btnDelete" class="btn btn-danger" href="#" role="button">Delete</a>
                        </td>
                        </tr>
                        <?php 
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>