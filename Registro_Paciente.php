<?php
include('conexion.php');
$conn = connection();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Paciente</title>
    <link rel="stylesheet" href="styleRegistroPaciente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
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
    <div class="formulario">
        <h1>Registro Paciente</h1>
        <form action="" method="POST">
            <input type="text" name="nombre_apellido" placeholder="Nombre de usuario" required>
            <input type="text" name="correo_electronico" placeholder="Correo" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="text" name="edad" placeholder="Edad" required>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreApellido = $_POST['nombre_apellido'];
    $correoElectronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];

    if ($edad < 18) {
        echo "<p>Las cuentas de menores de edad deben de ser supervisadas por un adulto</p>";
    }

    $stmt = $conn->prepare("CALL insertarPaciente(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nombreApellido, $correoElectronico, $contrasena, $telefono, $edad);

    if ($stmt->execute()) {
        echo "Registro exitoso!";
    } else {
        if (strpos($stmt->error, 'El correo electrónico ya está registrado') !== false) {
            echo "<p>Este correo ya está en uso</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>



