<?php
require_once __DIR__ . '/../app/Database/Database.php';
require_once __DIR__ . '/../app/Controllers/FichaController.php';
require_once __DIR__ . '/../app/Models/TeamModel.php';

use App\Controllers\FichaController;

$controller = new FichaController();
$controller->showFicha($_GET['id'] ?? null);
