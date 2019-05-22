<?php

class InputModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){

        try {

            $idCliente = $this->validateClient($data);
            
            if ($idCliente > 0) {
                $this->insertItem($data, $idCliente);
                header('Location: ' . constant('URL') . 'home');
                return true;
            }
            return false;
        } catch (PDOException $e) {
            // print_r('Error Save: ' . $e->getMessage());
            return false;
        }
        
    }

    public function validateClient($client){
        $queryvalidate = $this->db->connect()->prepare('SELECT * FROM CUSTUMER WHERE Nit = :nitCliente');
        try {
            $queryvalidate->execute([
                'nitCliente' => $client['nitCliente']
                ]);
            
            while ($row = $queryvalidate->fetch()) {
                $idClient = $row['Id'];
                return $idClient;
            }
                
            $query = $this->db->connect()->prepare('INSERT INTO CUSTUMER ( Name, Nit, Email, Contact, Phone) 
                                            VALUES(:nCliente, :nitCliente, :correoCliente, :contactoCliente, :telCliente)');
            $query->execute([
                'nCliente' => $client['nCliente'], 
                'nitCliente' => $client['nitCliente'], 
                'correoCliente' => $client['correoCliente'],
                'contactoCliente' => $client['contactoCliente'],
                'telCliente' => $client['telCliente']]);
                
            $queryvalidate->execute([
                'nitCliente' => $client['nitCliente']
                    ]);
            while ($row = $queryvalidate->fetch()) {
                $idClient = $row['Id'];
                return $idClient;
            }
            return 0;
            
        } catch (PDOException $e) {
            print_r('Error Save: ' . $e->getMessage());
            return 0;
        }
    }

    public function insertItem($item, $idcliente){

        $query = $this->db->connect()->prepare('INSERT INTO ITEM ( Item, Cause, Argument, Observation, DateCreation, Process, IdCustumer)
                                        VALUES(:equipo, :causa, :argumento, :observacion, :datecreacion, :proceso, :idcliente)');
        
        try {

            $query->execute([
                'equipo' => $item['equipo'],
                'causa' => $item['causa'],
                'argumento' => $item['argumento'],
                'observacion' => $item['observacion'],
                'datecreacion' => date("F j, Y, g:i a"),
                'proceso' => 1,
                'idcliente' => $idcliente
            ]);
            
        } catch (PDOException $e) {
            print_r('Error Save: ' . $e->getMessage());
            return false;
        }

    }
}
?>