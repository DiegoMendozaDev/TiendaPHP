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
        // $url = "localhost/servicios/rest/public/person/11";
        // $data = json_encode([
        //     "firstname" => "Ana",
        //     "lastname" => "García",
        // ]);
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // O "DELETE"
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_HTTPHEADER,
        //     array(
        //         'Content-Type: application/json',
        //         'Content-Length: ' . strlen($data)
        //     )
        // );
        // $response = curl_exec($ch);
        // // Verifica errores
        // if (curl_errno($ch)) {
        //     echo 'Error en cURL: ' . curl_error($ch);
        // } else {
        //     $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //     echo "Código de Estado HTTP: $http_code\n";
        //     echo "Respuesta: $response\n";
        // }
        // curl_close($ch);
        $this->view->mostrar('usuarios/register.php', []);
    }
    public function confirmarRegistro($params){
        print_r($params);
        // $this->view->mostrar('usuarios/register.php', $params);
    }
}
