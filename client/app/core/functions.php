<?php
function url($controller = 'Productos', $action = 'index', $param = [])
{
    $base_url = 'http://localhost/Proyecto_tienda_PHP/client/public';
    $param_string = !empty($param) ? '/' . implode('/', $param) : '';
    return "$base_url/$controller/$action$param_string";
}

function dataSanitize($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
function api($url,$data = [], $method = 'GET'){
    $ch = curl_init($url);
    if(!empty($data) || $method == 'DELETE'){
        $data = json_encode($data);
        // Ejemplo
        // $data = json_encode([
        //     "firstname" => "Ana",
        //     "lastname" => "García",
        // ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); // O "DELETE"
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    // Verifica errores
    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
        exit;
    } else {
        // Estado de la petición
        // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // echo "Código de Estado HTTP: $http_code\n";
        return json_decode($response);
    }
    curl_close($ch);
}
function logout(){
    session_start();
    session_destroy();
    session_unset();
    unset($_SESSION["email"]);
    unset($_SESSION["id"]);
    header("Location: http://localhost/Proyecto_tienda_PHP/client/app/views/usuarios/login.php");
}
