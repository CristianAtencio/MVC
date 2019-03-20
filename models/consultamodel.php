<?php 

include_once 'models/alumno.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAlumnos(){
        $items = [];

        try {
            
            $query = $this->db->connect()->query("SELECT * FROM ALUMNOS");

            while ($row = $query->fetch()) {
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];

                array_push($items,$item);
            }
            
            return $items;

        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($idAlumno){
        $item = new Alumno();

        $query = $this->db->connect()->prepare("SELECT * FROM ALUMNOS WHERE MATRICULA = :matricula");
        try {

            $query->execute(['matricula' => $idAlumno]);

            while ($row = $query->fetch()) {
                $item->matricula = $row['matricula'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];
            }
            return $item;

        } catch (PDOException $e) {
            return [];
        }
    }


    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE ALUMNOS SET NOMBRE = :nombre, APELLIDO = :apellido WHERE MATRICULA = :matricula");

        try {
            $query->execute([
                'matricula' => $item['matricula'],
                'nombre'    => $item['nombre'],
                'apellido'  => $item['apellido']
                ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($idAlumno){
        $query = $this->db->connect()->prepare('DELETE FROM ALUMNOS WHERE MATRICULA = :id');
        try {
            $query->execute(['id' => $idAlumno]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>