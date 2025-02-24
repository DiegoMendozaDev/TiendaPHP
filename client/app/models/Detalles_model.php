<?php 
class Detalles_model{

    public function __construct()
    {
        
    }
    public function anadirDetalle($idPedido, $idProducto){
        $datos=[
            "id_pedido" => $idPedido, 
            "id_producto"=>$idProducto,
            "cantidad" => 1
        ];
        $mensaje = api("https://127.0.0.1:8000/api/detalle/create", $datos, 'POST');
        return $mensaje;
    }
}