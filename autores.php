<?php
$titulo = 'Autores - Librería Online';
$pagina_activa = 'autores';
require 'includes/db.php';
require 'includes/header.php';

$stmt = $pdo->query('SELECT * FROM autores');
$autores = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="fw-bold"><i class="bi bi-people me-3"></i>Listado de Autores</h1>
    <span class="badge bg-dark fs-6 rounded-pill px-3 py-2"><?php echo count($autores); ?> autores</span>
</div>

<?php if (count($autores) > 0): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($autores as $autor): ?>
            <div class="col">
                <div class="card autor-card h-100 border-0 overflow-hidden">
                    <div class="card-header autor-header bg-dark text-white py-3 px-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="autor-avatar bg-secondary rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                <i class="bi bi-person-fill fs-2"></i>
                            </div>
                            <div>
                                <h5 class="card-title fw-bold mb-0">
                                    <?php echo htmlspecialchars($autor['nombre'] . ' ' . $autor['apellido']); ?>
                                </h5>
                                <small class="text-white-50"><?php echo htmlspecialchars($autor['id_autor']); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted"><i class="bi bi-telephone me-2"></i>Teléfono</span>
                                <span class="fw-semibold"><?php echo htmlspecialchars($autor['telefono']); ?></span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted"><i class="bi bi-geo-alt me-2"></i>Dirección</span>
                                <span class="fw-semibold text-end"><?php echo htmlspecialchars($autor['direccion']); ?></span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted"><i class="bi bi-building me-2"></i>Ciudad</span>
                                <span class="fw-semibold"><?php echo htmlspecialchars($autor['ciudad']); ?></span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="text-muted"><i class="bi bi-globe me-2"></i>País</span>
                                <span class="fw-semibold"><?php echo htmlspecialchars($autor['pais']); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top py-3 px-3">
                        <div class="row g-0 text-center small">
                            <div class="col-6 border-end">
                                <div class="text-muted text-uppercase small fw-semibold">Estado</div>
                                <div class="fw-bold"><?php echo htmlspecialchars($autor['estado']); ?></div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted text-uppercase small fw-semibold">Código Postal</div>
                                <div class="fw-bold"><?php echo htmlspecialchars($autor['cod_postal']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-info text-center">
        <i class="bi bi-info-circle me-2"></i>No hay autores disponibles.
    </div>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>
