<?php 

namespace Mini\Controller;

use Mini\Model\Proveedor;

class ProveedorController {
    
    public function index (){
        require APP.'view/Proveedores.php';
    }
}