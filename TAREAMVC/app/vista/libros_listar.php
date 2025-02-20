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
            <td>AUTOR</td>
            <td>TITULO</td>
            <td>PRECIO</td>
        </tr>
        <?php foreach($libros as $libro): ?>
            <tr>
                <td><?php echo $libro["nombre"]; ?></td>
                <td><?php echo "<a href='libros/ver/$libro[id]'>$libro[titulo]</a>"?> </td>
                <td><?php echo $libro["precio"]?> </td>
                <td> <form method='POST' action='libros/borrar/'><input type="hidden" name="hidden" value=<?php echo $libro["id"] ?>><input type='submit' name='borrar' value='Borrar'></form> </td>
                <td><form method='POST' action = 'libros/editarlibro/'><input type='hidden' name='hidden4' value='<?php echo $libro["id"] ?>'><input type="hidden" name="hidden3" value='<?php echo $libro['titulo'] ?>'><input type="hidden" name="hidden2" value=<?php echo $libro["precio"] ?>><input type='submit' name='editar' value='Editar'></form></td>
                <td><form method='POST' action='libros/listarautores/'><input type='hidden' name='hiddenasignar' value='<?php echo $libro["id"] ?>'><input type='submit' name='asignar' value='Asignar libro'></form></td>
            </tr>
        <?php endforeach;?>
      
    </table>
   
    <h2>Crear nuevo libro: </h2>
        <form method='POST' action='libros/crear/'>
            Titulo: <input type='text' name='nuevotitulo'>
            Precio: <input type='decimal' name='nuevoprecio'>
            
            <input type='submit' name='enviar' value='Crear libro'>
        </form>
    <h2>Crear nuevo autor: </h2>
        <form method='POST' action='libros/crearautor/'>
            Nombre: <input type='text' name='nuevoautor'>
            Nacionalidad: <input type='text' name='nuevanacionalidad'>
            <input type='submit' name='enviar2' value='Crear autor'>
        </form>
</body>
</html>