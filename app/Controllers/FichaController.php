<?php

namespace App\Controllers;

use App\Models\TeamModel;

class FichaController {
    public function showFicha($id) {
        if (!isset($id) || !is_numeric($id)) {
            die("ID de equipo no válido.");
        }

        $team = TeamModel::getById($id);

        if (!$team) {
            die("Equipo no encontrado.");
        }

        include __DIR__ . '/../Views/ficha.php';
    }
}
