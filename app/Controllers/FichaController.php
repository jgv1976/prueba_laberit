<?php

namespace App\Controllers;

use App\Models\TeamModel;
use App\Models\PlayerModel;

class FichaController {

    public function showFicha($id) {
        if (!isset($id) || !is_numeric($id)) {
            die("ID de equipo no válido.");
        }

        $team = TeamModel::getById($id);
        if (!$team) {
            die("Equipo no encontrado.");
        }

        // Obtener jugadores asociados al equipo
        $players = PlayerModel::getByTeamId($id);

        // Enviar los datos a la vista
        include __DIR__ . '/../Views/ficha.php';
    }

}

