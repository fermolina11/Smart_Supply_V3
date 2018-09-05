<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlProducto extends Model {

    private $id_producto;
    private $nombre_del_producto;
    private $tipo_de_producto;
    private $valor_de_venta;
    private $cantidad_en_existencia;
    private $stock_min;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

       

    

    public function listar(){
        $sql = "CALL SP_ListarProducto () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}