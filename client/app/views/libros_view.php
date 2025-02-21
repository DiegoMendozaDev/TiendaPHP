
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Libros</title>
</head>

<body>

    <head></head>
    <main>
        <h2>Libros de alta en la biblioteca</h2>
        <table border="1">
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><a href="<?= url('Libros_controller','verLibroId', [$libro->getId()])?>"><?= $libro->getTitulo() ?></a></td>
                    <td><?= $libro->getAutor()->getNombre()?></td>
                    <td><?= $libro->getPrecio() ?> €</td>
                    <td>
                        <form action="<?= url('Libros_controller','eliminarLibro',[$libro->getId()])?>">
                            <input type="submit" name='eliminar' value = 'eliminar'>
                        </form>
                    </td>
                    <td>
                        <form action="<?= url('Libros_controller','editar',[$libro->getId()])?>">
                            <input type="submit" value="editar" value = 'editar'>
                        </form>
                    </td>

                </tr>
            <?php endforeach ?>
        </table>
    </main>
</body>

</html>