<?php

class Productos_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }
    public function index(){
        session_start();
    
        require "../app/models/Productos_model.php";
        $producto_model = new Productos_model;
        $productos = $producto_model->todosProductos();
        $variables = [];
        $variables['productos'] = $productos;
        $this->view->mostrar('productos/index.php',$variables);
        
      
    }
    public function comprar(){
        session_start();
        if(!isset($_SESSION["email"]) && !isset($_SESSION["id"])){
            header("Location: http://localhost/Proyecto_tienda_PHP/client/public/usuarios/login");
            exit();
        }else{
            require "../app/models/Productos_model.php";
            $producto_model = new Productos_model;
            $productos = $producto_model->todosProductos();
            $variables = [];
            $variables['productos'] = $productos;
            $this->view->mostrar('productos/productos.php',$variables);
        }
        
    }
}