<?php 

namespace Mini\Model;

use Mini\Core\Model;

class mdlConsultaDetallePedido extends Model {

    private $id_detalle_pedido_producto;
    private $id_pedido;
    private $id_producto;
    private $cantidad;
    private $subtotal;

    

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }

    public function __GET($attr){
        return $this->$attr;
    }
   
        

    

    public function listar(){
        $sql = "CALL SP_InsertarPedido(?, ?, ?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_cliente);
        $stm->bindParam(2, $this->estado_de_pedido);
        $stm->bindParam(3, $this->tipo_venta);
        $stm->bindParam(4, $this->valor_total);
        $stm->bindParam(5, $this->observaciones);      
        return $stm->execute();
    }


}