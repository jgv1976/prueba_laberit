<?php include __DIR__ . '/templates/header.php'; ?>

<h1>Listado de equipos</h1>

<div class="new_team text-end mb-4 mt-3">
    <a href="equipo.php?action=create" class="btn btn-success d-inline-flex align-items-center">
        Añadir nuevo equipo
        <i class="fa-solid fa-plus ms-2"></i>
    </a>
</div>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Deporte</th>
            <th>Fecha de fundacion</th>
            <th>Ficha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team) : ?>
            <tr>
                <td><?php echo htmlspecialchars($team['name']) ?></td>
                <td><?php echo htmlspecialchars($team['city'] ?? 'N/A') ?></td>
                <td><?php echo htmlspecialchars($team['sport']) ?></td>
                <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($team['founded_date']))) ?></td>
                <td>
                    <a href="ficha.php?id=<?php echo htmlspecialchars($team['id']); ?>" class="btn btn-primary btn-sm">
                        Ver Ficha
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/templates/footer.php'; ?>
