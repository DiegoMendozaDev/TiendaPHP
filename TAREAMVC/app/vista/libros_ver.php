<!DOCTYPE html>
<html lang="en">
<head>
<title>LIBRERÍA ONLINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ver datos de un libro</h1>
        <table border="1">
            <tr>
                <th>TÍTULO</th>
                <th>PRECIO</th>
            </tr>
            <tr>
                <td><?php echo $libro['titulo'] ?></td>
                <td><?php echo $libro['precio']?></td>
            </tr>
        </table>
        <br>
        <a href="http://localhost/TAREAMVC/public">volver a la lista de libros</a>
</body>
</html>

