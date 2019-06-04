<?php

include_once 'models/user.php';

class AdminModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    function getUsers(){

        $users = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM USERS");

            while ($row = $query->fetch()) {
                $user = new User();

                $user->firstName    = $row['FirstName'];
                $user->lastName     = $row['LastName'];
                $user->departament  = $row['Departament'];
                $user->email        = $row['Email'];
                $user->user         = $row['User'];

                $queryrole = $this->db->connect()->prepare("SELECT * FROM ROLES WHERE ID = :role");

                $queryrole->execute(['role' => $row['IdRole']]); 

                if($row = $queryrole->fetch()) {
                    $user->role     = $row['Role'];
                }

                array_push($users,$user);
            }

            return $users;

        } catch (PDOException $e) {
            return [];
        }
    }

    function create($user){

        $query = $this->db->connect()->prepare('INSERT INTO USERS (FirstName, LastName, Departament, Email, User, Password, IdRole)
                                        VALUES(:nombre, :apellido, :departamento, :email, :user, :password, :role)');

        try {

            $query->execute([
                'nombre' => $user['nombre'],
                'apellido' => $user['apellido'],
                'departamento' => $user['departamento'],
                'email' => $user['correo'],
                'user' => $user['usuario'],
                'password' => $user['clave'],
                'role' => $user['rol']
            ]);

            header('Location: ' . constant('URL') . 'admin/index');
                return true;
            
        } catch (PDOException $e) {
            print_r('Error Save: ' . $e->getMessage());
            return false;
        }
    }

    function GetByUser($user){
        
        
        $query = $this->db->connect()->prepare('SELECT * FROM USERS WHERE USER = :user');

        try {
            $query->execute(['user' => $user]);

            if($row = $query->fetch()){

                $userresponse = new User();

                $userresponse->firstName    = $row['FirstName'];
                $userresponse->lastName     = $row['LastName'];
                $userresponse->departament  = $row['Departament'];
                $userresponse->email        = $row['Email'];
                $userresponse->user         = $row['User'];

                $queryrole = $this->db->connect()->prepare("SELECT * FROM ROLES WHERE ID = :role");

                $queryrole->execute(['role' => $row['IdRole']]); 

                if($row = $queryrole->fetch()) {
                    $userresponse->role     = $row['Role'];
                }

                return $userresponse;
            }

            return "";
        } catch (PDOException $e) {
            print_r('Error Search: ' . $e->getMessage());
            return "";
        }
    }


    function existByEmail($email){
        $query = $this->db->connect()->prepare("SELECT * FROM USERS WHERE EMAIL = :email");

        try {
            $query->execute([
                'email' => $email]);

            if ($row = $query->fetch()) {
                return true;
            }
            return false;
            
        } catch (PDOException $e) {
            print_r('Error Search: ' . $e->getMessage());
            return false;
        }
    }


    function update($user){

        $query = $this->db->connect()->prepare('UPDATE USERS SET FirstName = :nombre, LastName = :apellido, Departament = :departamento, Email = :email, IdRole = :role WHERE  User = :user');

        try {

            $query->execute([
                'nombre' => $user['nombre'],
                'apellido' => $user['apellido'],
                'departamento' => $user['departamento'],
                'email' => $user['correo'],
                'user' => $user['usuario'],
                'role' => $user['rol']
            ]);

                return true;
            
        } catch (PDOException $e) {
            print_r('Error update: ' . $e->getMessage());
            return false;
        }
    }


}

?>