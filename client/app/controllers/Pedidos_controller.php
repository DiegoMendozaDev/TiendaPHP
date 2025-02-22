<?php
class Pedidos_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }
    public function anadirCarrito($params)
    {
        require "../app/models/Pedidos_model.php";
        $pedidos_model = new Pedidos_model;
        $mensaje = $pedidos_model->anadirPedido($params['idUsuario'],'comprando');
        print_r($mensaje);
        // header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
        // exit;
    }

}