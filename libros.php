<?php
$titulo = 'Libros - Librería Online';
$pagina_activa = 'libros';
require 'includes/db.php';
require 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM titulos');
$libros = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="fw-bold"><i class="bi bi-book me-3"></i>Listado de Libros</h1>
    <span class="badge bg-dark fs-6 rounded-pill px-3 py-2"><?php echo count($libros); ?> libros</span>
</div>

<?php if (count($libros) > 0): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($libros as $libro): ?>
            <div class="col">
                <div class="card libro-card h-100 border-0 overflow-hidden">
                    <div class="card-header libro-header bg-dark text-white d-flex justify-content-between align-items-center py-2 px-3">
                        <span class="fw-bold"><?php echo htmlspecialchars($libro['id_titulo']); ?></span>
                        <span class="badge bg-secondary rounded-pill"><?php echo htmlspecialchars($libro['tipo']); ?></span>
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title fw-bold mb-2"><?php echo htmlspecialchars($libro['titulo']); ?></h5>
                        <?php if (!empty($libro['notas'])): ?>
                            <p class="card-text text-muted fst-italic small notas-truncate">
                                <?php echo htmlspecialchars($libro['notas']); ?>
                            </p>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="precio-libro fs-3 fw-bold">
                                <?php echo $libro['precio'] !== null ? '$' . number_format($libro['precio'], 2) : 'N/A'; ?>
                            </div>
                            <?php if ($libro['contrato'] == '1'): ?>
                                <span class="badge btn-verde px-3 py-2">Contrato Sí</span>
                            <?php else: ?>
                                <span class="badge bg-secondary px-3 py-2">Contrato No</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top py-3 px-3">
                        <div class="row g-0 text-center small">
                            <div class="col-6 col-md-3 border-end">
                                <div class="text-muted text-uppercase small fw-semibold">Avance</div>
                                <div class="fw-bold"><?php echo $libro['avance'] !== null ? number_format($libro['avance'], 2) : 'N/A'; ?></div>
                                <div class="progress mt-1 mx-2" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $libro['avance'] !== null ? min(100, ($libro['avance'] / 10000) * 100) : 0; ?>%"></div>
                                </div>
                                <div class="text-muted xsmall"><?php echo $libro['avance'] !== null ? min(100, round(($libro['avance'] / 10000) * 100)) : 0; ?>%</div>
                            </div>
                            <div class="col-6 col-md-3 border-end">
                                <div class="text-muted text-uppercase small fw-semibold">Ventas</div>
                                <div class="fw-bold"><?php echo $libro['total_ventas'] !== null ? number_format($libro['total_ventas']) : 'N/A'; ?></div>
                                <div class="text-success mt-1">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 border-end">
                                <div class="text-muted text-uppercase small fw-semibold">ID</div>
                                <div class="fw-bold"><?php echo htmlspecialchars($libro['id_pub']); ?></div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="text-muted text-uppercase small fw-semibold">Fecha</div>
                                <div class="fw-bold"><?php echo date('d/m/Y', strtotime($libro['fecha_pub'])); ?></div>
                            </div>
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
