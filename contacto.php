<?php
$titulo = 'Contacto - Librería Online';
$pagina_activa = 'contacto';
require 'includes/db.php';
require 'includes/header.php';

$mensaje = '';
$tipo_mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $asunto = trim($_POST['asunto'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');

    $errores = [];

    if (empty($nombre)) {
        $errores[] = 'El nombre es obligatorio.';
    }

    if (empty($correo)) {
        $errores[] = 'El correo es obligatorio.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo no tiene un formato válido.';
    }

    if (empty($telefono)) {
        $errores[] = 'El teléfono es obligatorio.';
    }

    if (empty($asunto)) {
        $errores[] = 'El asunto es obligatorio.';
    }

    if (empty($comentario)) {
        $errores[] = 'El comentario es obligatorio.';
    }

    if (count($errores) === 0) {
        try {
            $stmt = $pdo->prepare('INSERT INTO contacto (fecha, correo, telefono, nombre, asunto, comentario) VALUES (NOW(), :correo, :telefono, :nombre, :asunto, :comentario)');
            $stmt->execute([
                ':correo' => $correo,
                ':telefono' => $telefono,
                ':nombre' => $nombre,
                ':asunto' => $asunto,
                ':comentario' => $comentario
            ]);

            $mensaje = 'Tu mensaje ha sido enviado correctamente.';
            $tipo_mensaje = 'success';

            $nombre = '';
            $correo = '';
            $telefono = '';
            $asunto = '';
            $comentario = '';
        } catch (PDOException $e) {
            $mensaje = 'Ocurrió un error al enviar el mensaje. Inténtalo de nuevo.';
            $tipo_mensaje = 'danger';
        }
    } else {
        $mensaje = 'Por favor corrige los siguientes errores:';
        $tipo_mensaje = 'danger';
    }
}
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white py-3">
                <h1 class="h4 mb-0"><i class="bi bi-envelope me-2"></i>Contacto</h1>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="lead text-muted mb-4">
                    ¿Tienes alguna pregunta o comentario? Completa el formulario y nos pondremos en contacto contigo.
                </p>

                <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-<?php echo $tipo_mensaje; ?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $tipo_mensaje === 'success' ? '¡Enviado!' : '¡Atención!'; ?></strong>
                        <?php if ($tipo_mensaje === 'danger' && isset($errores) && count($errores) > 0): ?>
                            <ul class="mb-0 mt-2">
                                <?php foreach ($errores as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <?php echo htmlspecialchars($mensaje); ?>
                        <?php endif; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" action="contacto.php" novalidate>
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="correo" class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email" class="form-control form-control-lg" id="correo" name="correo" value="<?php echo isset($correo) ? htmlspecialchars($correo) : ''; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                            <input type="tel" class="form-control form-control-lg" id="telefono" name="telefono" value="<?php echo isset($telefono) ? htmlspecialchars($telefono) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-semibold">Asunto</label>
                        <input type="text" class="form-control form-control-lg" id="asunto" name="asunto" value="<?php echo isset($asunto) ? htmlspecialchars($asunto) : ''; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="comentario" class="form-label fw-semibold">Comentario</label>
                        <textarea class="form-control form-control-lg" id="comentario" name="comentario" rows="5" required><?php echo isset($comentario) ? htmlspecialchars($comentario) : ''; ?></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg">
                            <i class="bi bi-send me-2"></i>Enviar mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
