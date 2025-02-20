<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //Incluimos el FrontController
    require '../app/core/frontController.php';
    try{
        
        //Lo iniciamos con su método estático main.
        FrontController::main();

    }catch (Exception $e){
        echo $e->getMessage();
    }
?>
</body>
</html>