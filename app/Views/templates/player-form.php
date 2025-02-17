<?php include __DIR__ . '/templates/header.php'; ?>

<div class="container">
    <h2 class="text-center my-4">Añadir Jugador</h2>

    <form action="player-form.php" method="POST" class="row g-3">
        <input type="hidden" name="team_id" value="<?php echo htmlspecialchars($_GET['team_id']); ?>">

        <div class="col-12">
            <label class="form-label">Nombre del jugador:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-12">
            <label class="form-label">Número:</label>
            <input type="number" name="number" class="form-control" required min="1">
        </div>

        <div class="col-12">
            <input type="checkbox" name="is_captain" id="is_captain">
            <label for="is_captain">Es capitán</label>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar Jugador</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>
