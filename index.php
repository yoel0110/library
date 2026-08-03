<?php
$titulo = 'Inicio - Librería Online';
$pagina_activa = 'inicio';
require 'includes/header.php';
?>

<div class="p-5 mb-4 bg-light rounded-3 border">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><i class="bi bi-book-half me-3"></i>Bienvenido a Librería Online</h1>
        <p class="col-md-8 fs-4">
            Explora nuestro catálogo de libros disponibles, conoce a nuestros autores y contáctanos para cualquier consulta.
        </p>
    </div>
</div>

<div class="row align-items-md-stretch">
    <div class="col-md-4 mb-4">
        <div class="h-100 p-5 text-white bg-primary rounded-3">
            <h2><i class="bi bi-book me-2"></i>Libros</h2>
            <p>Consulta el listado completo de libros disponibles en nuestra librería.</p>
            <a href="libros.php" class="btn btn-outline-light" type="button">Ver libros</a>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2><i class="bi bi-people me-2"></i>Autores</h2>
            <p>Conoce a los autores que forman parte de nuestro catálogo.</p>
            <a href="autores.php" class="btn btn-outline-secondary" type="button">Ver autores</a>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="h-100 p-5 text-white bg-success rounded-3">
            <h2><i class="bi bi-envelope me-2"></i>Contacto</h2>
            <p>¿Tienes alguna pregunta? Envíanos un mensaje y te responderemos pronto.</p>
            <a href="contacto.php" class="btn btn-outline-light" type="button">Contactar</a>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
