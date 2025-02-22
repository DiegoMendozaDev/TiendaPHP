<?php
function url($controller = 'Libros_controller', $action = 'verLibros', $param = [])
{
    $base_url = 'http://localhost/Proyecto_tienda_PHP/client/public';
    $param_string = !empty($param) ? '/' . implode('/', $param) : '';
    return "$base_url/$controller/$action$param_string";
}

function dataSanitize($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
function api($url){
    $url = "https://127.0.0.1:8000/api/productos/ver";
    $data = json_encode([
        "firstname" => "Ana",
        "lastname" => "García",
    ]);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // O "DELETE"
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    $response = curl_exec($ch);
    // Verifica errores
    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        echo "Código de Estado HTTP: $http_code\n";
        echo "Respuesta: $response\n";
    }
    curl_close($ch);
}
