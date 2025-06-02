<?php
include('Conexion.php');
$conn = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NombreApellido = $_POST["NombreApellido"];
    $FechaCita = $_POST["FechaCita"];
    $HoraCita = $_POST["HoraCita"];
    $MotivoCancelacion = $_POST["MotivoCancelacion"];

    $query = "CALL CancelarCita('$NombreApellido', '$FechaCita', '$HoraCita', '$MotivoCancelacion')";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar Cita - Clínica San Pedro</title>
    <link rel="stylesheet" href="StyleCancelar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <h1>
            <a href="Menu.php">Clínica San Pedro</a>
            <img src="imagenes/QuickPoint.png" class="Quickpoint" alt="Logo QuickPoint">
            <img src="imagenes/Vortex_Digital.png" class="vortex" alt="Vortex Digital Logo">
            <a href="Login.php"><img src="imagenes/Login.png" class="login" alt="Imagen Login"></a>
        </h1>
    </div>

    <div class="container">
        <nav class="menu-lateral">
            <h2>Menú</h2>
           <a href="perfilPaciente.php" class="boton">Informacion Personal</a> 
           <a href="GenerarCita.php" class="boton">Agendar cita</a>
           <a href="CancelarCita.php" class="boton">Cancelar cita</a>
           <a href="Servicios.html" class="boton">Servicios</a>
           <a href="Mision_Vision.html" class="boton">Mision y Vision</a>
        </nav>
        
       

        <form action="CancelarCita.php" method="post" class="form-container">
        <div class="CancelarCita">
            <h2>Cancelar Cita</h2>
        </div>
        <br><br>
            <div class="nombre-contenedor">
                <div class="NombrePaciente">
                    <label for="NombreApellido">Paciente (Nombre y Apellido)</label>
                    <input type="text" id="NombreApellido" name="NombreApellido" placeholder="Nombre Apellido" required>
                </div>
            </div>
            <br><br>
            <div class="Citas">
                <div class="Fecha">
                    <label for="FechaCita">Fecha De Cita</label>
                    <input type="date" id="FechaCita" name="FechaCita" required>
                </div>
                <br>
                <div class="Hora">
                    <label for="HoraCita">Hora De Cita</label>
                    <select id="HoraCita" name="HoraCita" class="form-control" required>
                    <option value="08:00">08:00 AM -- 9:00 AM</option>
                    <option value="09:00">09:00 AM -- 10:00 AM</option>
                    <option value="10:00">10:00 AM -- 11:00 AM</option>
                    <option value="11:00">11:00 AM -- 12:00 PM</option>
                    <option value="12:00">01:00 PM -- 02:00 PM</option>
                    <option value="13:00">02:00 PM -- 03:00 PM</option>
                    <option value="14:00">03:00 PM -- 04:00 PM</option>
                    <option value="15:00">04:00 PM -- 05:00 PM</option>
                </select>
                </div>
            </div>
            <br><br>
            
            <label for="MotivoCancelacion" class="titulo-motivo">Motivo de Cancelación:</label>
            <div class="Motivo-y-boton">
                <div class="MotivoCancelacion">
                    <div class="contenido-motivo">
                        <input type="text2" id="MotivoCancelacion" name="MotivoCancelacion" placeholder="Motivo de la Cancelación" required>
                    </div>
                </div>

                <button type="submit" class="btn-btn-primary">
                    <img src="imagenes\boton cancelar.png" alt="Guardar" class="Boton-Cancelar" height="125" >
                </div>
            </div>
        </form>
    </div>
</body>
</html>

