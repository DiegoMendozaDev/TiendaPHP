<?php 
class Productos_model{

    public function __construct()
    {
        
    }
    public function todosProductos(){
        $url = "http://127.0.0.1:8000/api/productos/ver";
        // $data = json_encode([
        //     "firstname" => "Ana",
        //     "lastname" => "García",
        // ]);
        $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // O "DELETE"
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_HTTPHEADER,
        //     array(
        //         'Content-Type: application/json',
        //         'Content-Length: ' . strlen($data)
        //     )
        // );
        $response = curl_exec($ch);
        // Verifica errores
        if (curl_errno($ch)) {
            echo 'Error en cURL: ' . curl_error($ch);
            $error = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            echo $error;
            exit;
        } else {
            // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo "Código de Estado HTTP: $http_code\n";
            return json_decode($response);
        }
        curl_close($ch);
    }
}