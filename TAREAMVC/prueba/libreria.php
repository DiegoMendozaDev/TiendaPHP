<?php
try{
    $dsn = "mysql:host=localhost;dbname=libreria";
    $user = "root";
    $pwd = "";
    $conexion = new PDO($dsn, $user, $pwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $conexion->query("SELECT titulo, precio FROM libros");
}catch(PDOException $e){
    echo "ERROR".$e;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Libros dados de alta en nuestra libreria</h1>
    <table border="1">
        <tr>
            <td>TITULO</td>
            <td>PRECIO</td>
        </tr>
        <?php while($libro = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
        <tr> 
            <td><?php echo $libro["titulo"]?> </td>
            <td><?php echo $libro["precio"]?> </td>
        </tr>
        <?php endwhile; ?>
        
    </table>
</body>
</html>