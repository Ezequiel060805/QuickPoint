<?php
include('datosPaciente.php');
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
    <div class="container">
        <nav class="menu-lateral">
            <h2>Menú</h2>
           <a href="ModificarPaciente.php" class="boton">Modificar Perfil</a> 
            <a href="perfilCitas.php" class="boton">Mostrar Citas</a>
           <a href="GenerarCita.php" class="boton">Agendar cita</a>
           <a href="CancelarCita.php" class="boton">Cancelar cita</a>
        </nav>
        <main id="TablaPaciente">
         <p><h2>Perfil de Paciente</h2></p> 
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Paciente</th>
                        <td><?php echo $row['IdPaciente']; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre y Apellido</th>
                        <td><?php echo $row['NombreApellido']; ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento</th>
                        <td><?php echo $row['Fecha_Nacimiento']; ?></td>
                    </tr>
                    <tr>
                        <th>Edad</th>
                        <td><?php echo $row['Edad']; ?></td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td><?php echo $row['Sexo']; ?></td>
                    </tr>
                    <tr>
                        <th>Cirugías que ha tenido</th>
                        <td><?php echo $row['Cirugias_Accidentes']; ?></td>
                    </tr>
                    <tr>
                        <th>Presión</th>
                        <td><?php echo $row['Presion']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipo de Sangre</th>
                        <td><?php echo $row['TipoSangre']; ?></td>
                    </tr>
                    <tr>
                        <th>Peso</th>
                        <td><?php echo $row['Peso']; ?></td>
                    </tr>
                    <tr>
                        <th>Estatura</th>
                        <td><?php echo $row['Estatura']; ?></td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td><?php echo $row['Direccion']; ?></td>
                    </tr>
                    <tr>
                        <th>Teléfono Celular</th>
                        <td><?php echo $row['TelefonoMovil']; ?></td>
                    </tr>
                    <tr>
                        <th>Teléfono de casa</th>
                        <td><?php echo $row['TelefonoCasa']; ?></td>
                    </tr>
                    <tr>
                        <th>Enfermedades</th>
                        <td><?php echo $row['Enfermedades']; ?></td>
                    </tr>
                    <tr>
                        <th>Alergias</th>
                        <td><?php echo $row['Alergias']; ?></td>
                    </tr>
                </tbody>
            </table>
      </main>
    </div>
</body>
</html>
<?php
?>
