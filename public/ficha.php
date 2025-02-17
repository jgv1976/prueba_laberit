<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\FichaController;

$controller = new FichaController();
$controller->showFicha($_GET['id'] ?? null);
