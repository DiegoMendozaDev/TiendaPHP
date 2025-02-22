<?php
class Usuarios_model
{
    public function __construct()
    {
        
    }
    public function register(){
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
    }
}
