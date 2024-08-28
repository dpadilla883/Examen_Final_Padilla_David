<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Agregar Nuevo Libro</h1>
    <form id="addLibroForm">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo"><br><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor"><br><br>
        <label for="año_publicacion">Año de Publicación:</label>
        <input type="text" id="año_publicacion" name="año_publicacion"><br><br>
        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero"><br><br>
        <input type="submit" value="Agregar">
    </form>

    <script>
        document.getElementById('addLibroForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            axios.post('/gestion_libros2/create', {
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
                console.error('Hubo un error al intentar agregar el libro:', error);
            });
        });
    </script>
</body>
</html>

