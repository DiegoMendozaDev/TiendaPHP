<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar libro</title>
</head>

<body>
    <header>
        <h1>Libro <?= $libro->getTitulo() ?></h1>
    </header>
    <form action="<?= url('Libros_controller','editarLibro')?>" method="POST">
        <label>Titulo: <input type="text" name="nombre" value="<?= $libro->getTitulo() ?>"></label>
        <label>Precio: <input type="number" name="precio" value="<?= $libro->getPrecio() ?>"></label>
        <select name="autor">
            <?php foreach($autores as $autor):?>
                <?php if($libro->getAutor()->getId() == $autor->getId()):?>
                    <option value="<?=$autor->getId()?>" selected>
                        <?= $autor->getNombre()?>
                    </option>
                <?php else:?>
                    <option value="<?=$autor->getId()?>">
                        <?= $autor->getNombre()?>
                    </option>
                <?php endif;?>
            <?php endforeach;?>
        </select>
        <input type="hidden" name="id" value="<?= $libro->getId() ?>">
        <input type="submit" value="Actualizar" name="actualizar">
    </form>
    <a href="<?= url()?>">volver</a>
</body>