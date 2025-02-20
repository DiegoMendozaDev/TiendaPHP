<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editando el libro:  <?php echo $_POST["hidden4"]?></h1>
    <form method='POST' action="http://localhost/TAREAMVC/public/libros/editar">
        Titulo: <input type='text' name='titulo' value='<?php echo "$_POST[hidden3]"; ?>'>
        Precio: <input type='decimal' name='precio' value='<?php echo "$_POST[hidden2]"; ?>'>
        <input type='hidden' name='hidden5' value='<?php echo $_POST["hidden4"]?>'>
        <input type='submit' name='enviar' value='Editar'>
    </form>
</body>
</html>