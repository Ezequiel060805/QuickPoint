<?php
    include ('conexion.php');
    $conn = connection();

    include 'validar.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica San Pedro</title>
    <link rel="stylesheet" href="StyleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<aside class="container">
<div class="login-box">
            <h2>INICIA SESIÓN EN TU CUENTA</h2>
            <form class="menu" method="post" action="">
                <div class="mb-3">
                <label for ="Correo_Electronico" class="form-label">Correo Electronico</label> 
                <input type="text" class="form-control" name="Correo_Electronico" required>
                </div>
                <div class="mb-3">
                <label for="Contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="Contrasena" required>
            </div>
            <input class="boton btn btn-primary" type="submit" name="Boton" value="Iniciar Sesión">
        </form>  
        <a href="#"><b>¿No tienes cuenta? Crear una cuenta</b></a> </div> </aside>
<footer>
    <small>Derechos reservados 2024</small>
</footer>
</body>
</html>
<?php

?>
