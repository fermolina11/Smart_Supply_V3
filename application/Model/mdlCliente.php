<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlCliente extends Model {

    private $id_cliente;
    private $tipo_documento;
    private $numero_documento;
    private $nombre_cliente;
    private $apellido_cliente;
    private $direccion;
    private $telefono;
    private $celular;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }

       

    

    public function listar(){
        $sql = "CALL SP_ListarCliente () ";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}