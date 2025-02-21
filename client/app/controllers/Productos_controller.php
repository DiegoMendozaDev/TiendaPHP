<?php
class Productos_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }
    public function index(){
        $this->view->mostrar('productos/index.php',[]);
    }
}