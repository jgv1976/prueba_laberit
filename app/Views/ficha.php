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

    <div class="text-center mt-4">
        <a href="equipo.php" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver al listado de equipos
        </a>
    </div>

</div>

<?php include __DIR__ . '/templates/footer.php'; ?>
