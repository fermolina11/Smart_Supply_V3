<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Clientes extends Model {

    public function listar(){
        $sql = "SELECT * FROM cliente";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}