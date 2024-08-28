<?php
require_once 'config/db.php';

class Libro {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->dbConnection();
    }

    public function getAllLibros() {
        $stmt = $this->conn->prepare("SELECT * FROM libros");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLibroById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM libros WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createLibro($data) {
        $stmt = $this->conn->prepare("INSERT INTO libros (titulo, autor, año_publicacion, genero) VALUES (:titulo, :autor, :año_publicacion, :genero)");
        $stmt->bindParam(":titulo", $data['titulo']);
        $stmt->bindParam(":autor", $data['autor']);
        $stmt->bindParam(":año_publicacion", $data['año_publicacion']);
        $stmt->bindParam(":genero", $data['genero']);
        $stmt->execute();
    }

    public function updateLibro($id, $data) {
        $stmt = $this->conn->prepare("UPDATE libros SET titulo = :titulo, autor = :autor, año_publicacion = :año_publicacion, genero = :genero WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":titulo", $data['titulo']);
        $stmt->bindParam(":autor", $data['autor']);
        $stmt->bindParam(":año_publicacion", $data['año_publicacion']);
        $stmt->bindParam(":genero", $data['genero']);
        $stmt->execute();
    }

    public function deleteLibro($id) {
        $stmt = $this->conn->prepare("DELETE FROM libros WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
?>
