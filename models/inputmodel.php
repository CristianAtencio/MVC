<?php

include_once 'models/item.php';

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

    public function getItem($idItem){

        $query = $this->db->connect()->prepare('SELECT * FROM ITEM WHERE ID = :id');
        try {
            $query->execute(['id' => $idItem]);

            $item = new Item();

            while ($row = $query->fetch()) {
                $item->id           = $row['Id'];
                $item->item         = $row['Item'];
                $item->cause        = $row['Cause'];
                $item->argument     = $row['Argument'];
                $item->observation  = $row['Observation'];
                $item->model        = $row['model'];
                $item->voltage      = $row['voltage'];
                $item->power        = $row['power'];
                $item->seria1       = $row['serial1'];
                $item->serial2      = $row['serial2'];
                $item->cause2       = $row['cause2'];
                $item->observation2 = $row['observation2'];
                $item->parts        = $row['parts'];
            }

            return $item;

        }catch (PDOException $e) {
            print_r('Error Save: ' . $e->getMessage());
            return null;
        }
    }

    public function updateRevision($item){

        $query = $this->db->connect()->prepare('UPDATE ITEM SET USERREVISION = :userRevision, MODEL = :model, VOLTAGE = :voltage, POWER = :power, SERIAL1 = :serial1, SERIAL2 = :serial2, CAUSE2 = :cause2, PARTS = :parts, OBSERVATION2 = :observation2, PROCESS = :process, DATEUPDATE = :dateUpdate WHERE  ID = :idItem');

        try {
            $query->execute([
                'idItem'       => $item['idItem'],
                'model'        => $item['modelo'],
                'voltage'      => $item['voltaje'],
                'power'        => $item['potencia'],
                'serial1'      => $item['serial1'],
                'serial2'      => $item['serial2'],
                'cause2'       => $item['causa2'],
                'parts'        => $item['piezas'],
                'observation2' => $item['observacion2'],
                'userRevision' => $item['userRevision'],
                'process' => 2,
                'dateUpdate' => date("F j, Y, g:i a")
            ]);

            return true;

        } catch (PDOException $e) {
            print_r('Error update: ' . $e->getMessage());
            return false;
        }

    }
}
?>