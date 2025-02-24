<?php 
class Productos_model{

    public function __construct()
    {
        
    }
    public function todosProductos(){
        $productos = api("http://127.0.0.1:8000/api/productos/ver");
        return $productos;
    }
}