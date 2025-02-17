<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PlayerController;

$action = $_GET['action'] ?? '';

if ($action === 'add_player') {

    $controller = new PlayerController();
    $response = $controller->createPlayer($_POST);
    echo json_encode($response);
    exit;

} elseif ($action === 'delete_player') {

    $controller = new PlayerController();
    $response = $controller->deletePlayer($_POST['id'] ?? 0);
    echo json_encode($response);
    exit;

}elseif ($action === 'edit_player') {

    $controller = new PlayerController();
    $response = $controller->updatePlayer($_POST);
    echo json_encode($response);
    exit;
}

// Si la acción no es reconocida
echo json_encode(["success" => false, "message" => "Acción no válida"]);
exit;



