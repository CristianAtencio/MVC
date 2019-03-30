<?php

include_once 'models/userhelper.php';

class LoginModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function validateLogin($item){
        
        $user = new UserHelper();

        $query = $this->db->connect()->prepare("SELECT * FROM USERS AS U INNER JOIN ROLES AS R WHERE U.USER = :user AND U.PASSWORD = :pass AND U.IDROLE = R.ID");

        try {
            $query->execute([
                'user' => $item['user'], 
                'pass' => $item['pass']
                ]);

            while ($row = $query->fetch()) {
                $user->firstName = $row['FirstName'];
                $user->lastName  = $row['LastName'];
                $user->user      = $row['User'];
                $user->role      = $row['Role'];
            }
            return $user;
        } catch (PDOException $e) {
            return [];
        }

    }
}
?>