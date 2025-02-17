<?php include __DIR__ . '/templates/header.php'; ?>

<div class="container">
    <h2 class="text-center my-4">Crear un Nuevo Equipo</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php echo implode("<br>", $errors); ?>
        </div>
    <?php endif; ?>

    <form id="team-form" action="equipo.php" method="POST" class="row g-3">
        <div class="col-12">
            <label class="form-label">Nombre del equipo:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-12">
            <label class="form-label">Ciudad:</label>
            <input type="text" name="city" id="city" class="form-control">
        </div>
        <div class="col-12">
            <label class="form-label">Deporte:</label>
            <select name="sport" id="sport" class="form-select" required>
                <option value="Futbol">Fútbol</option>
                <option value="Baloncesto">Baloncesto</option>
                <option value="Voleibol">Voleibol</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label">Fecha de fundación:</label>
            <input type="date" name="founded_date" id="founded_date" class="form-control" required>
        </div>
        <div class="col-12">
            <label class="form-label">Historia del equipo:</label>
            <textarea name="history" id="history" class="form-control" rows="4" placeholder="Escribe la historia del equipo..."></textarea>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Crear Equipo</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>

