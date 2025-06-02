<?php
include ('conexion.php');
$conn = connection();

include 'validar.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica San Pedro</title>
    <link rel="stylesheet" href="stylemenu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="header">
    <h1>
        <a href="Menu.php" class="navbar-link">Clinica San Pedro</a>
        <img src="Imagenes/QuickPoint.png" class="quickPoint" alt="Logo QuickPoint">
        <img src="Imagenes/Vortex_Digital.png" class="vortex" alt="Vortex Digital Logo">
        <a href="Login.php" class="d-inline-block">
            <img src="Imagenes/Login.png" class="login" alt="Imagen Login">
        </a>
    </h1>
    </div>
    <div class="container">
        <nav class="menu-lateral">
            <h2>Menú</h2>
           <a href="perfilPaciente.php" class="boton">Perfil Personal</a>
           <a href="perfilCitas.php" class="boton">Mostrar Citas</a> 
           <a href="GenerarCita.php" class="boton">Agendar cita</a>
           <a href="CancelarCita.php" class="boton">Cancelar cita</a>
           <a id="misionVisionBtn" class="boton">Misión y Visión</a>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide carrusel" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Imagenes/bienvenido.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Imagenes/Servicios.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Imagenes/Mision.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Imagenes/Wellcome.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <script>
        document.getElementById('misionVisionBtn').addEventListener('click', function () {
            var carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleIndicators'));
            carousel.to(2); 
        });
    </script>
</body>
</html>

