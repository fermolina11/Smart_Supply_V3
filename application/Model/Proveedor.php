<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Proveedor extends Model {

    private $id;
    private $nombre_proveedor;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar(){
        $sql = "SELECT * FROM proveedor";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}