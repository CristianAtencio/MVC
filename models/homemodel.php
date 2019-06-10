<?php

include_once 'models/item.php';

class HomeModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    function getItems(){

        $items = [];

        try {
            
            $query = $this->db->connect()->query("SELECT * FROM ITEM");

            while ($row = $query->fetch()) {
                $item = new Item();
                $item->id           = $row['Id'];
                $item->item         = $row['Item'];
                $item->cause        = $row['Cause'];
                $item->argument     = $row['Argument'];
                $item->observation  = $row['Observation'];

                array_push($items, $item);
            }

            return $items;

        } catch (PDOException $e) {
            return [];
        }

    }

}

?>