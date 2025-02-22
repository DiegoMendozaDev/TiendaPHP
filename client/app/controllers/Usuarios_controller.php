<?php
class Usuarios_controller
{
    private $view;

    function __construct()
    {
        $this->view = new View();
    }
    public function login()
    {
        $this->view->mostrar('usuarios/login.php', []);
    }
    public function register()
    {

        $this->view->mostrar('usuarios/register.php', []);
    }
    public function confirmarRegistro($params){
        print_r($params);
        // $this->view->mostrar('usuarios/register.php', $params);
    }
}
