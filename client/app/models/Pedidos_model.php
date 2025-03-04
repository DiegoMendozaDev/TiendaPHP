<?php 
class Pedidos_model{

    public function __construct()
    {
        
    }
    public function anadirPedido($idUsuario, $estado){
        $datos=[
            "id_usuario" => $idUsuario, 
            "estado"=>$estado
        ];
        $mensaje = api("http://127.0.0.1:8000/api/pedido/create", $datos, 'POST');
        return $mensaje;
    }
    public function verPedido($idUsuario,$estado){
        $datos=[
            "id_usuario" => $idUsuario, 
            "estado"=>$estado
        ];
        $mensaje = api("http://127.0.0.1:8000/api/pedido/verCarrito", $datos);
        return $mensaje;
    }
    public function eliminarPedido($idPedido){
        $mensaje = api("http://127.0.0.1:8000/api/pedido/eliminar/".$idPedido, method:'DELETE');
        return $mensaje;
    }
    public function pedidoComprado($idPedido){
        $datos = [
            'estado'=> "comprado"
        ];
        $mensaje = api("http://127.0.0.1:8000/api/pedido/editar/".$idPedido, $datos,'PUT');
        return $mensaje;
    }
}