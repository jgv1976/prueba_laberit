<?php
require_once __DIR__ . '/../app/Database/Database.php';
require_once __DIR__ . '/../app/Controllers/TeamController.php';
require_once __DIR__ . '/../app/Models/TeamModel.php';

use App\Controllers\TeamController;

$controller = new TeamController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $controller->createTeam($_POST);
} elseif (isset($_GET['action']) && $_GET['action'] === 'create') {
    // Muestra el formulario de creación
    $controller->showCreateForm();
} else {
    // Muestra el listado de equipos
    $controller->listTeams();
}

