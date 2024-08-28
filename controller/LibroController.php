<?php
require_once 'model/Libro.php';

class LibroController {
    private $model;

    public function __construct() {
        $this->model = new Libro();
    }

    public function index() {
        $libros = $this->model->getAllLibros();
        require_once 'view/libros/index.php';
    }

    public function show($id) {
        return $this->model->getLibroById($id);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!empty($data['titulo']) && !empty($data['autor']) && !empty($data['año_publicacion']) && !empty($data['genero'])) {
            $this->model->createLibro($data);
            echo json_encode(['message' => 'Libro creado exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al crear el libro, todos los campos son requeridos']);
        }
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!empty($data['titulo']) && !empty($data['autor']) && !empty($data['año_publicacion']) && !empty($data['genero'])) {
            $this->model->updateLibro($id, $data);
            echo json_encode(['message' => 'Libro actualizado exitosamente']);
        } else {
            echo json_encode(['message' => 'Error al actualizar el libro, todos los campos son requeridos']);
        }
    }

    public function delete($id) {
        $this->model->deleteLibro($id);
        echo json_encode(['message' => 'Libro eliminado exitosamente']);
    }
}
?>
