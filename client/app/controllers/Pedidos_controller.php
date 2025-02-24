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
        require "../app/models/Detalles_model.php";
        $detalles_model = new Detalles_model;
        $pedidos_model = new Pedidos_model;
        $mensaje = $pedidos_model->anadirPedido($params['idUsuario'],'comprando');
        $detalle = $detalles_model->anadirDetalle($mensaje->id_pedido,$params['idProducto']);
        header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
        exit;
    }
    public function verCarrito($params)
    {
        require "../app/models/Pedidos_model.php";
        $pedidos_model = new Pedidos_model;
        $mensaje = $pedidos_model->verPedido($params[0],'comprando');
        $data = [];
        $data["productos"] = $mensaje;
        //$pedidos_model->verPedido($params['idUsuario'],'comprando');
        $this->view->mostrar('pedidos/index.php',$data);
    }
    public function vaciarCarrito($params)
    {
        require "../app/models/Pedidos_model.php";
        require "../app/models/Productos_model.php";
        $pedidos_model = new Pedidos_model;
        $mensaje = $pedidos_model->eliminarPedido($params['id_pedido']);
        header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
    }

}