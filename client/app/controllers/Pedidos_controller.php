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
        session_start();
        if(!$_SESSION["email"] && !$_SESSION["id"]){
            header("Location: http://localhost/Proyecto_tienda_PHP/client/app/views/usuarios/login.php");
        }else{
            require "../app/models/Pedidos_model.php";
            require "../app/models/Detalles_model.php";
            $detalles_model = new Detalles_model;
            $pedidos_model = new Pedidos_model;
            $mensaje = $pedidos_model->anadirPedido($params['idUsuario'],'comprando');
            $detalle = $detalles_model->anadirDetalle($mensaje->id_pedido,$params['idProducto']);
            header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
            exit;
        }
        
    }
    public function verCarrito($params)
    {
        session_start();
        if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
        header("Location: http://localhost/Proyecto_tienda_PHP/client/app/views/usuarios/login.php");
        }else{
            require "../app/models/Pedidos_model.php";
            $pedidos_model = new Pedidos_model;
            $mensaje = $pedidos_model->verPedido($params[0],'comprando');
            $data = [];
            $data["productos"] = $mensaje;
            //$pedidos_model->verPedido($params['idUsuario'],'comprando');
            $this->view->mostrar('pedidos/index.php',$data);
        }
       
    }
    public function vaciarCarrito($params)
    {
        session_start();
        if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
            header("Location: http://localhost/Proyecto_tienda_PHP/client/public/usuarios/login");
        }else{
            require "../app/models/Pedidos_model.php";
            $pedidos_model = new Pedidos_model;
            $mensaje = $pedidos_model->eliminarPedido($params['id_pedido']);
            header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
        }
       
    }
    public function confirmarPedido($params)
    {
        session_start();
        if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
            header("Location: http://localhost/Proyecto_tienda_PHP/client/app/views/usuarios/login.php");
        }else{
            require "../app/models/Pedidos_model.php";
            $pedidos_model = new Pedidos_model;
            $mensaje = $pedidos_model->pedidoComprado($params['id_pedido']);
            header('Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/comprar');
        }
       
    }

}