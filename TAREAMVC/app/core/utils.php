<?php
    function url($controller = 'libros', $action = 'listar', $params = []){
        $base_url = "http://localhost/public/index.php";
        $param_string = !empty($params) ? '/' . implode('/', $params) : '';
        return "$base_url/$controller/$action$param_string";
    }
    function dataSanitize($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }
?>