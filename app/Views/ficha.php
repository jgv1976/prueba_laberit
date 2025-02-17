<?php include __DIR__ . '/templates/header.php'; ?>

<div class="container mt-4">

    <header class="text-center bg-primary text-white py-4">
        <h1><?php echo htmlspecialchars($team['name']); ?></h1>
        <h4 class="mt-2"><?php echo htmlspecialchars($team['city'] ?? 'Ciudad no disponible'); ?> -
            <?php echo htmlspecialchars(date("d/m/Y", strtotime($team['founded_date']))); ?>
        </h4>
    </header>

    <div class="card mt-4 p-4">
        <h3>Historia del equipo</h3>
        <p><?php echo nl2br(htmlspecialchars($team['history'] ?? 'No hay información disponible.')); ?></p>
    </div>

    <div class="card mt-4 p-4">

        <h3>Jugadores del equipo</h3>

        <div class="text-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPlayerModal">
                <i class="fa-solid fa-user-plus"></i> Añadir jugador
            </button>
        </div>


        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Capitán</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($players as $player) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($player['name']); ?></td>
                        <td><?php echo htmlspecialchars($player['number']); ?></td>
                        <td><?php echo $player['is_captain'] ? 'Sí' : 'No'; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-player"
                                data-player-id="<?php echo $player['id']; ?>"
                                data-player-name="<?php echo htmlspecialchars($player['name']); ?>"
                                data-player-number="<?php echo $player['number']; ?>"
                                data-player-captain="<?php echo $player['is_captain']; ?>">
                                <i class="fa-solid fa-pen"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm delete-player" data-player-id="<?php echo $player['id']; ?>">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="equipos.php" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver al listado de equipos
        </a>
    </div>

</div>

<!-- Modal para añadir jugador -->
<div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlayerModalLabel">Añadir Jugador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="addPlayerForm">
                    <input type="hidden" name="team_id" value="<?php echo $team['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nombre del jugador:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Número:</label>
                        <input type="number" name="number" class="form-control" required min="1">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_captain" id="is_captain" class="form-check-input">
                        <label class="form-check-label" for="is_captain">Es capitán</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Jugador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar jugador -->
<div class="modal fade" id="editPlayerModal" tabindex="-1" aria-labelledby="editPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlayerModalLabel">Editar Jugador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="editPlayerForm">
                    <input type="hidden" name="id" id="edit-player-id">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="name" id="edit-player-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número:</label>
                        <input type="number" name="number" id="edit-player-number" class="form-control" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_captain" id="edit-player-captain" class="form-check-input">
                        <label for="edit-player-captain" class="form-check-label">Es capitán</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/templates/footer.php'; ?>
