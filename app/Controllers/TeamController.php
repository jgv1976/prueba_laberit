<?php

namespace App\Controllers;

use App\Models\TeamModel;

class TeamController {
    public function listTeams() {
        $teams = TeamModel::getAll();
        foreach ($teams as &$team) {
            $team['player_count'] = TeamModel::getPlayerCount($team['id']);
        }
        include __DIR__ . '/../Views/team-list.php';
    }

    public function showCreateForm() {
        include __DIR__ . '/../Views/team-form.php';
    }

    public function createTeam(array $data) {
        $errors = [];

        // Validar Nombre
        if (empty($data['name']) || strlen($data['name']) < 3) {
            $errors[] = "El nombre del equipo debe tener al menos 3 caracteres.";
        }

        // Validar Ciudad
        $city = !empty($data['city']) ? htmlspecialchars(trim($data['city'])) : null;

        // Validar Deporte
        $validSports = ['Futbol', 'Baloncesto', 'Volleyball', 'Otros'];
        if (empty($data['sport']) || !in_array($data['sport'], $validSports)) {
            $errors[] = "Es necesario indicar un deporte válido.";
        }

        // Validar Fecha de Fundación
        if (empty($data['founded_date']) || !strtotime($data['founded_date'])) {
            $errors[] = "Es necesario indicar una fecha válida.";
        }

        // Validar Historia
        if (!empty($data['history']) && strlen($data['history']) < 10) {
            $errors[] = "La historia del equipo debe tener al menos 10 caracteres.";
        }

        // Si hay errores, mostramos mensaje y detenemos la creación
        if (!empty($errors)) {
            return "<div class='alert alert-danger'>" . implode("<br>", $errors) . "</div>";
        }

        // Crear equipo si pasa las validaciones
        $team = new TeamModel(
            htmlspecialchars(trim($data['name'])),
            $data['sport'],
            $data['founded_date'],
            $city,
            htmlspecialchars(trim($data['history'])) ?? null
        );

        if ($team->save()) {
            header("Location: equipo.php");
            exit;
        } else {
            return "<div class='alert alert-danger'>Error al guardar el equipo.</div>";
        }
    }

}


