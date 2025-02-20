<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        A quien le asignas este libro?
        <form method='POST' action="http://localhost/TAREAMVC/public/libros/asignar2">
            <select type='number' name='eleccion'>
                <?php
                foreach($autores as $autor){
                    echo "<option>$autor[id_autor]-$autor[nombre]</option>";
                    
                    }
                ?>
                </select><br>
                <input type='hidden' name='hiddenlibro' value='<?php echo $_POST["hiddenasignar"]; ?>'>
                <input type='submit' name='enviar' value='Asignar autor'>
        </form>
        
       
    
</body>
</html>