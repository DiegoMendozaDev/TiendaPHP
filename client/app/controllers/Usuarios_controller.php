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
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $contraseña = $_POST["contrasena"];
            $contraseña2 = $_POST["contrasena2"];
            $direccion = $_POST["direccion"];
            $cp = $_POST["codigo_postal"];
            if($contraseña == $contraseña2){
                require "../app/models/Usuarios_model.php";
                $usuario_model = new Usuarios_model;
                $mensaje = $usuario_model->register($nombre, $email, $contraseña, $direccion, $cp);
               header('Location: http://localhost/Proyecto_tienda_PHP/client/app/views/usuarios/login.php');
                exit;
            }else{
                echo "Error al registrarse";
            }
          
        }
       
        
        //$this->view->mostrar('usuarios/register.php', []);
    }
    public function iniciar_sesion(){
        
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $_POST["email"];
                $contraseña = $_POST["contrasena"];
                require "../app/models/Usuarios_model.php";
                $usuario_model = new Usuarios_model;
                $comprobar = $usuario_model->iniciar_sesion($email, $contraseña);
                $id = $usuario_model->idporemail($email);
                if($comprobar == true){
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $id;
                    header("Location: http://localhost/Proyecto_tienda_PHP/client/public/productos/index");
                }else{
                    echo "Error al iniciar sesion";
                }
            }
        
    
    }
    

    public function confirmarRegistro($params){
        print_r($params);
        
        var_dump($_POST);
        // $this->view->mostrar('usuarios/register.php', $params);
    }
    public function logout(){
        logout();
    }
}
