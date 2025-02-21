<?php

//Incluimos el FrontController
require '../app/vendor/autoload.php';
require '../app/core/Front_controller.php';
try {
    //Lo iniciamos con su método estático main.
    Front_controller::main();
} catch (Exception $e) {
    echo $e->getMessage();
}
