<?php
    

    namespace Mini\Controller;
    use Mini\Model\mdlProducto;
    use Mini\Model\mdlCliente;
    use Mini\Model\mdlPedido;
    use Mini\Model\mdlConsultaPedido;
    

    
    


    class PedidoController {

      
       
        public function index(){

            $producto = new mdlProducto();
            $productos = $producto->listar();
            $cliente = new mdlCliente();
            $clientes = $cliente->listar();

            
            require APP.'view/index.php';
            
        } 

        public function consultaPedido(){

            $pedido = new mdlPedido();
            $pedidos = $pedido->listar();

           
           
            
            require APP.'view/consultaPedido.php';
            
        } 
        
        public function guardar(){

            $pedido = new mdlPedido();

            $pedido->__SET("id_cliente_pedido", $_POST["ddlCliente"]);
            $pedido->__SET("estado_de_pedido", $_POST["estadoPedido"]);
            $pedido->__SET("tipo_venta", $_POST["tipoVenta"]);
            $pedido->__SET("valor_total", $_POST["totales"]);
            $pedido->__SET("observaciones", $_POST["observaciones"]);
            $pedido->insertarPedido();
            
            if($pedido){

                $ultima = $pedido->ultimaVenta();
                

                
                
                for ($i=0; $i < count($_POST["idProducto"]); $i++) { 
                    $pedido->__SET("id_pedido", $ultima->ultima);
                    $pedido->__SET("id_producto", $_POST["idProducto"][$i]);
                    $pedido->__SET("cantidad", $_POST["cantidades"][$i]);
                    $pedido->__SET("subtotal", $_POST["subtotal"][$i]);

                    try{
                        if($pedido->insertarDetallePedido()){
                            $_SESSION["mensaje"] = "alert('Pedido Guardado con éxito')";

                        }else{
                            $_SESSION["mensaje"] = "alert('No se guardo el Pedido')";
                        }
                    }catch(\Exception $e) {
                        $_SESSION["mensaje"] = $e->getMessage();
                    }
                    
                  
                    }
                    
                }
                header("location: ".URL."pedido/consultaPedido");
            }
 
        }
            
              
        

    





