<?php 

namespace Mini\Controller;

use Mini\Model\Producto;
use Mini\Model\Proveedor;
use Mini\Model\Categoria;
use Mini\Model\Detalle;

class ProductoController {
    
    public function index(){
        $proveedor = new Proveedor();
        $categoria = new Categoria();
        $categoria->__SET("nombre_c", "");
        $lista = $categoria->Listar_categoria();
        $proveedor->__SET("nombre_empresa","");
        $proveedores = $proveedor->listar();
        
        require APP.'view/Productos.php';
    }
    
    public function tabla(){
        $producto = new Producto();
        $salida="";
        
        if(isset($_POST['producto']) &&isset($_POST['proveedor'])){
            $producto->__SET("nombre", $_POST["producto"]);
            $producto->__SET("proveedor", $_POST["proveedor"]);
            $productos = $producto->listar_productos();
        }else {
            $producto->__SET("nombre", "");
            $producto->__SET("proveedor", "");
            $productos = $producto->listar_productos();
        }
        
if(empty($productos)){
    $salida.="No hay registros";
}else {
$salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio de venta</th>
                <th>Existencia</th>
                <th>Estado</th>
                <th>Stock minimo</th>
                <th>Categoria</th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
foreach($productos as $value):
if($value->estado_producto==1){
    $estados = "Inhabilitar";
    $texto = "Activo";
    $color = "red";
} else {
    $estados = "Habilitar";
    $texto = "Inactivo";
    $color = "green";
}
                $salida.="<tr>
                <td>
                    ".$value->id_producto."
                </td>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->precio_venta."
                </td>
                <td>
                    ".$value->existencia."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    ".$value->stock_minimo."
                </td>
                <td>
                    ".$value->nombre_categoria."
                </td>
                <td>
                    <button id='editar_p' value=".$value->id_producto.">Modificar</button>
                </td>
                <td>
                    <button id='asignar' value=".$value->id_producto.">Proveedores</button>
                </td>
                <td>
                    <button style='background-color: ".$color." ;' id='Estado_p' value=".$value->id_producto.">".$estados."</button>
                </td>
    </tr>"; 
endforeach;
$salida.="</tbody></table>";
        
    }
        echo $salida;
    }
    
    public function guardar(){
        $producto = new Producto();
        $detalle = new Detalle();
        
        if(isset($_POST['producto']) && isset($_POST['precio']) && isset($_POST['existencia']) && isset($_POST['stock']) && isset($_POST['idc']) && isset($_POST['idp'])) {
        $producto->__SET("nombre", $_POST["producto"]);
        $producto->__SET("precio_venta", $_POST["precio"]);
        $producto->__SET("existencia", $_POST["existencia"]);
        $producto->__SET("stock", $_POST["stock"]);
        $producto->__SET("id_categoria", $_POST["idc"]);
        $detalle->__SET("proveedor", $_POST["idp"]);
            
        if($producto->guardar()){
        $existe = $producto->traer_id();
        $id= $existe->id_producto;
        $detalle->__SET("producto", $id);
        if($detalle->guardar_detalle()){
            echo $id;
        }else {
            echo "no";
        }
        }else {
            echo "No se guardo";
        }
        }else {
            echo "No llegaron datos";
        }
    }
    
    public function estado_producto(){
        $producto = new Producto();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $producto->__SET("id", $_POST["id"]);
        $producto->__SET("estado", $_POST["estado"]);
            
            
        if($producto->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }
        
    public function consultar_producto(){
        $producto = new Producto();
        if(isset($_POST['producto'])) {
        $producto->__SET("nombre", $_POST["producto"]);
        $existe = $producto->buscar_producto();
        
            if(empty($existe)){
            echo "no";
            }else{
            echo "El producto ya existe";
            }
        }else{
            echo "No llegaron datos";
        }
    
    }
    
    public function editar(){
        $producto = new Producto();
        
        if(isset($_POST['id'])){
        $producto->__SET("id", $_POST['id']);
        $p = $producto->consultar(); 
        echo json_encode($p,JSON_FORCE_OBJECT);    
        }
}
    
    public function modificar(){
        $producto = new Producto();
        
        if(isset($_POST['id']) &&isset($_POST['producto']) && isset($_POST['precio']) && isset($_POST['existencia']) && isset($_POST['stock']) && isset($_POST['idc'])) {
        $producto->__SET("nombre", $_POST["producto"]);
        $producto->__SET("id", $_POST["id"]);
        $producto->__SET("precio_venta", $_POST["precio"]);
        $producto->__SET("existencia", $_POST["existencia"]);
        $producto->__SET("stock", $_POST["stock"]);
        $producto->__SET("id_categoria", $_POST["idc"]);
            
        if($producto->modificar()){
            echo "si";
        }else {
            echo "no";
        }
        }else {
            echo "No llegaron datos";
        }
    }
    
}
