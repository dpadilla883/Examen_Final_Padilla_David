<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/public/js/app.js"></script>
</head>
<body>
    <h1>Lista de Libros</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año de Publicación</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($libros as $libro): ?>
        <tr>
            <td><?php echo $libro['id']; ?></td>
            <td><?php echo $libro['titulo']; ?></td>
            <td><?php echo $libro['autor']; ?></td>
            <td><?php echo $libro['año_publicacion']; ?></td>
            <td><?php echo $libro['genero']; ?></td>
            <td>
                <a href="edit/<?php echo $libro['id']; ?>">Editar</a> |
                <a href="javascript:void(0)" onclick="deleteLibro(<?php echo $libro['id']; ?>)">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="create" style="display: block; text-align: center; margin: 20px auto;">Agregar Nuevo Libro</a>
</body>
</html>
