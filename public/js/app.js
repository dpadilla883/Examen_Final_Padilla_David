function deleteLibro(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este libro?")) {
        axios.post(`/gestion_libros2/delete/${id}`)
        .then(response => {
            console.log(response.data.message);
            window.location.href = '/gestion_libros2/';
        })
        .catch(error => {
            console.error('Hubo un error al intentar eliminar el libro:', error);
        });
    }
}
