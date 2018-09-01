<?php 

namespace Mini\Controller;

use Mini\Model\Movimientos;
use Mini\Model\Producto;

class MovimientosController {
    
    public function index(){
        $productos = new Producto();
        $m = new Movimientos();
        $productos->__SET("nombre", "");
        $productos->__SET("proveedor", "");
        $pro = $productos->listar_productos();
        $m->__SET("tipo", "");
        $m->__SET("producto ", "");
        $mov = $m->listar_movimientos();
        require APP.'view/_templates/header.php';
        require APP.'view/Movimientos.php';
        require APP.'view/_templates/footer.php';
    }
    
    public function tabla(){
        $salida = "";
        $mov = new Movimientos();
        
        if(isset($_POST['tipo']) && isset($_POST['producto'])){
        $mov->__SET("tipo", $_POST['tipo']);
        $mov->__SET("producto", $_POST['producto']);
        $mv = $mov->listar_movimientos();
        }else {
        $mov->__SET("tipo", "");
        $mov->__SET("producto", "");
        $mv = $mov->listar_movimientos();  
        }
        if(empty($mv)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tipo de movimiento</th>
                <th>cantidad</th>
                <th>Descripcion</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>";
        foreach($mv as $value):
        $salida.="<tr>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->tipo_movimiento."
                </td>
                <td>
                    ".$value->cantidad."
                </td>
                <td>
                    ".$value->descripcion."
                </td>
                <td>
                    ".$value->fecha."
                </td>
    </tr>"; 
        endforeach;
            $salida.="</tbody></table>";
        }
        echo $salida;
    }
    
    
    
}