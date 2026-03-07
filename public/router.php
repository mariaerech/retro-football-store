<?php
//obtem parametros da url
$controllerName = $_GET['controller'] ?? 'cliente';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

//monta caminho e classe do controller
$controllerClass = 'App\\Controllers\\' . ucfirst($controllerName) . 'Controller';
$controllerFile = __DIR__ . '/../src/Controller/' . ucfirst($controllerName) . 'Controller.php';

//verifica se o arq controller existe
if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "Controller '$controllerName' não encontrado.";
    exit;
}

//requere o controller
require_once $controllerFile;

$controller = new $controllerClass();

//executa ação solicitada
switch ($action) {
    case 'store':
        $controller->store($_POST);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>