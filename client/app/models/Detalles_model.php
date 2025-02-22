<?php 
class Detalles_model{

    public function __construct()
    {
        
    }
    public function anadirDetalle($idUsuario, $estado){
        $datos=[
            "id_usuario" => $idUsuario, 
            "estado"=>$estado
        ];
        $mensaje = api("https://127.0.0.1:8000/api/pedido/create", $datos, 'POST');
        return $mensaje;
    }
}