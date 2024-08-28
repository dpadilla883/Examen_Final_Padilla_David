<?php
require_once 'controller/LibroController.php';

$controller = new LibroController();

if (isset($_GET['route'])) {
    $route = $_GET['route'];
    $routeParts = explode('/', $route);
    $action = $routeParts[0];
    $id = $routeParts[1] ?? null;
} else {
    $action = 'index';
}

switch($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $libro = $controller->show($id);
        require_once 'view/libros/show.php';
        break;
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->create();
            exit();
        } else {
            require_once 'view/libros/create.php';
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($id);
            exit();
        } else {
            $libro = $controller->show($id);
            require_once 'view/libros/edit.php';
        }
        break;
    case 'delete':
        $controller->delete($id);
        exit();
    default:
        echo "404 - Not Found";
        break;
}
?>
