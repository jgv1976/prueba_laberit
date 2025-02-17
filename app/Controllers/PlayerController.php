<?php

namespace App\Controllers;

use App\Models\PlayerModel;

class PlayerController {

    public function deletePlayer(int $id) {
        if ($id <= 0) {
            return ["success" => false, "message" => "ID no es válido."];
        }

        if (PlayerModel::delete($id)) {
            return ["success" => true];
        } else {
            return ["success" => false, "message" => "Error al eliminar el jugador."];
        }
    }


    public function createPlayer(array $data) {
        if (empty($data['name']) || empty($data['number']) || empty($data['team_id'])) {
            return ["success" => false, "message" => "Todos los campos son obligatorios."];
        }

        $player = new PlayerModel(
            htmlspecialchars(trim($data['name'])),
            (int)$data['number'],
            (int)$data['team_id'],
            isset($data['is_captain']) ? true : false
        );

        if ($player->save()) {
            return ["success" => true];
        } else {
            return ["success" => false, "message" => "Error al ejecutar save(). Verifica error_log."];
        }
    }

    public function updatePlayer(array $data) {
        if (empty($data['id']) || empty($data['name']) || empty($data['number'])) {
            return ["success" => false, "message" => "Todos los campos son obligatorios."];
        }

        $success = PlayerModel::update(
            (int)$data['id'],
            htmlspecialchars(trim($data['name'])),
            (int)$data['number'],
            isset($data['is_captain']) ? true : false
        );

        return ["success" => $success];
    }

}
