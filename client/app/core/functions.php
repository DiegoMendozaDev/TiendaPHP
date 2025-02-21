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
