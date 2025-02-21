
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Libro <?= $libro->getTitulo() ?></h2>
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td><a href="<?= url('Libros_controller','verLibroId', [$libro->getId()])?>"><?= $libro->getTitulo() ?></a></td>
            <td><?= $libro->getPrecio() ?> €</td>
            </form>
        </tr>

    </table>
    <a href="<?= url()?>">volver</a>
</body>

</html>