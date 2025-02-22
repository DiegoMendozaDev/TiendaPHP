<?php

use App\Entity\Producto;

class Productos_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }
    public function index(){
        require "../app/models/Productos_model.php";
        $producto_model = new Productos_model;
        $productos = $producto_model->todosProductos();
        $variables = [];
        $variables['productos'] = $productos;
        $this->view->mostrar('productos/index.php',$variables);
    }
    public function comprar(){
        require "../app/models/Productos_model.php";
        $producto_model = new Productos_model;
        $productos = $producto_model->todosProductos();
        $variables = [];
        $variables['productos'] = $productos;
        $this->view->mostrar('productos/productos.php',$variables);
    }
}