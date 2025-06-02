<?php
include('datosCita.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica San Pedro</title>
    <link rel="stylesheet" href="StyleEzequiel.css">
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
    <div class="containerCitas">
    <nav class="menu-lateral">
            <h2>Menú</h2>
           <a href="perfilPaciente.php" class="boton">Perfil Personal</a> 
            <a href="ModificarPaciente.php" class="boton">Modificar Perfil</a>
           <a href="GenerarCita.php" class="boton">Agendar cita</a>
           <a href="CancelarCita.php" class="boton">Cancelar cita</a>
        </nav>
        <main class="contenido-main">
            <h2><strong>CITAS DEL PACIENTE</strong></h2> 
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Medico</th>
                        <th>Fecha de la Cita</th>
                        <th>Hora de la Cita</th>
                        <th>Motivo</th>
                        <th>Tipo de Cita</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citas as $cita): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cita['NombreMApellidoM']); ?></td>
                        <td><?php echo htmlspecialchars($cita['FechaCita']); ?></td>
                        <td><?php echo htmlspecialchars($cita['HoraCita']); ?></td>
                        <td><?php echo htmlspecialchars($cita['Motivo']); ?></td>
                        <td><?php echo htmlspecialchars($cita['TipoCita']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
<?php
?>
