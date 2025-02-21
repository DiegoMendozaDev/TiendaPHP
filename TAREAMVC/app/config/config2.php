<?php
    $config = Config::getInstance();
    $config->set('CONTROLLERS_FOLDER', '../app/controladores/');
    $config->set('MODELS_FOLDER', '../app/modelo/');
    $config->set('VIEWS_FOLDER', '../app/vista/');
    $config->set('DEFAULT_CONTROLLER', 'libros');
    $config->set('DEFAULT_ACTION', 'listar');
    $config->set('dbhost', 'localhost');
    $config->set('dbname', 'libreria');
    $config->set('dbuser', 'root');
    $config->set('dbpass', '');
?>

