<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Editar Libro</h1>
    <form id="editLibroForm">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $libro['titulo']; ?>"><br><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo $libro['autor']; ?>"><br><br>
        <label for="año_publicacion">Año de Publicación:</label>
        <input type="text" id="año_publicacion" name="año_publicacion" value="<?php echo $libro['año_publicacion']; ?>"><br><br>
        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero" value="<?php echo $libro['genero']; ?>"><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>

    <script>
        document.getElementById('editLibroForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const libroId = <?php echo $libro['id']; ?>;
            const formData = new FormData(this);

            axios.post(`/gestion_libros2/edit/${libroId}`, {
                titulo: formData.get('titulo'),
                autor: formData.get('autor'),
                año_publicacion: formData.get('año_publicacion'),
                genero: formData.get('genero')
            })
            .then(response => {
                console.log(response.data.message);
                window.location.href = '/gestion_libros2/';
            })
            .catch(error => {
                console.error('Hubo un error al intentar guardar los cambios:', error);
            });
        });
    </script>
</body>
</html>
