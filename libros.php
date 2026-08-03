<?php
$titulo = 'Libros - Librería Online';
$pagina_activa = 'libros';
require 'includes/db.php';
require 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM titulos');
$libros = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-book me-3"></i>Listado de Libros</h1>
    <span class="badge bg-primary fs-6"><?php echo count($libros); ?> libros</span>
</div>

<?php if (count($libros) > 0): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($libros as $libro): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><?php echo htmlspecialchars($libro['id_titulo']); ?></span>
                        <span class="badge bg-light text-primary"><?php echo htmlspecialchars($libro['tipo']); ?></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($libro['titulo']); ?></h5>
                        <?php if (!empty($libro['notas'])): ?>
                            <p class="card-text text-muted fst-italic small">
                                <?php echo htmlspecialchars($libro['notas']); ?>
                            </p>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-success">
                                <?php echo $libro['precio'] !== null ? '$' . number_format($libro['precio'], 2) : 'N/A'; ?>
                            </span>
                            <?php if ($libro['contrato'] == '1'): ?>
                                <span class="badge bg-success">Contrato Sí</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Contrato No</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-light border-top-0">
                        <div class="row text-center small">
                            <div class="col-6">
                                <div class="text-muted">Avance</div>
                                <div class="fw-semibold"><?php echo $libro['avance'] !== null ? number_format($libro['avance'], 2) : 'N/A'; ?></div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted">Ventas</div>
                                <div class="fw-semibold"><?php echo $libro['total_ventas'] !== null ? number_format($libro['total_ventas']) : 'N/A'; ?></div>
                            </div>
                        </div>
                        <div class="mt-2 text-center text-muted small">
                            <i class="bi bi-building me-1"></i><?php echo htmlspecialchars($libro['id_pub']); ?>
                            <span class="mx-2">|</span>
                            <i class="bi bi-calendar me-1"></i><?php echo date('d/m/Y', strtotime($libro['fecha_pub'])); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-info text-center">
        <i class="bi bi-info-circle me-2"></i>No hay libros disponibles.
    </div>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>
