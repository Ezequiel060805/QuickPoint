<?php
require('C:\Users\ezequ\OneDrive\Documentos\UT de San Luis Rio Colorado\Cuatrimestre 3\Integradora 1\Integradora\fpdf186 (1)\fpdf.php'); // Ajusta esta ruta según sea necesario
include('Conexion.php');
$conn = connection();

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 16);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 10, 'Cita Generada', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NombreApellido = $_POST["NombreApellido"];
    $NombreMApellidoM = $_POST["NombreMApellidoM"];
    $TipoCita = $_POST["TipoCita"];
    $FechaCita = $_POST["FechaCita"];
    $HoraCita = $_POST["HoraCita"];
    $Motivo = $_POST["Motivo"];

    $consultar = "CALL generarcita('$NombreApellido', '$NombreMApellidoM', '$TipoCita', '$FechaCita', '$HoraCita', '$Motivo')";
    if (mysqli_query($conn, $consultar)) {
        // Generación de PDF
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Paciente: ' . $NombreApellido, 0, 1);
        $pdf->Cell(0, 10, 'Profesional: ' . $NombreMApellidoM, 0, 1);
        $pdf->Cell(0, 10, 'Tipo de Cita: ' . $TipoCita, 0, 1);
        $pdf->Cell(0, 10, 'Fecha: ' . $FechaCita, 0, 1);
        $pdf->Cell(0, 10, 'Hora: ' . $HoraCita, 0, 1);
        $pdf->Cell(0, 10, 'Motivo: ' . $Motivo, 0, 1);
        $pdf->Output('D', 'Cita_' . $NombreApellido . '_' . $FechaCita . '.pdf'); // Guarda el PDF y desencadena la descarga
    } else {
        echo "Error al generar la cita.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Cita - Clínica San Pedro</title>
    <link rel="stylesheet" href="GeneraCitaStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <h1>
            <a href="Menu.php">Clínica San Pedro</a>
            <img src="imagenes/QuickPoint.png" class="Quickpoint" alt="Logo QuickPoint">
            <img src="imagenes/Vortex_Digital.png" class="vortex" alt="Vortex Digital Logo">
            <img src="imagenes/Login.png" class="login" alt="Imagen Login"></a>
        </h1>
    </div>
    <div class="container">
        <nav class="menu-lateral">
            <h2>Menú</h2>
            <a href="perfilPaciente.php" class="boton">Informacion Personal</a>
            <a href="GenerarCita.php" class="boton">Agendar cita</a>
            <a href="CancelarCita.php" class="boton">Cancelar cita</a>
            <a href="Servicios.html" class="boton"></a>
            <a href="Mision_Vision.html" class="boton"></a>
        </nav>
        <br><br>
        <form action="GenerarCita.php" method="post" class="form-container">
            <div class="nombre-contenedor">
                <div class="CrearCita">
                    <a>Crear Cita</a>
                </div>
                <br>
                <div class="NombrePaciente">
                    <label for="NombreApellido">Paciente (Nombre y Apellido)</label>
                    <input type="text" id="NombreApellido" name="NombreApellido" placeholder="Nombre Apellido" required>
                </div>
                <div class="NombreProfesional">
                    <label for="NombreMApellidoM">Profesional (Nombre y Apellido)</label>
                    <select name="NombreMApellidoM" id="NombreMApellidoM" class="form-control" required>
                        <option value="Julian Martinez">Julian Martinez (Pediatria)</option>
                        <option value="Luis Gonzalez">Luis Gonzalez (Cardiología)</option>
                        <option value="Ana Ramirez">Ana Ramirez (Dermatología)</option>
                        <option value="Carlos Lopez">Carlos Lopez (Neurología)</option>
                        <option value="María Hernandez">María Hernandez (Ginecología)</option>
                        <option value="Pedro Martinez">Pedro Martinez (Ortopedia)</option>
                        <option value="Laura Gomez">Laura Gomez (Oftalmología)</option>
                        <option value="Jorge Perez">Jorge Perez (Oncología)</option>
                        <option value="Lucía Rodriguez">Lucía Rodriguez (Psiquiatría)</option>
                        <option value="Miguel Sanchez">Miguel Sanchez (Reumatología)</option>
                        <option value="Cristina Fernandez">Cristina Fernandez (Gastroenterología)</option>
                        <option value="David Ruiz">David Ruiz (Endocrinología)</option>
                        <option value="Elena Diaz">Elena Diaz (Neonatología)</option>
                        <option value="Roberto Ortiz">Roberto Ortiz (Hematología)</option>
                        <option value="Sofia Morales">Sofia Morales (Urología)</option>
                        <option value="Daniel Castro">Daniel Castro (Cirugía General)</option>
                        <option value="Isabel Núñez">Isabel Núñez (Nefrología)</option>
                        <option value="Fernando Jimenez">Fernando Jimenez (Neurocirugía)</option>
                        <option value="Patricia Mendoza">Patricia Mendoza (Hematología)</option>
                        <option value="Rafael Reyes">Rafael Reyes (Infectología)</option>
                    </select>
                </div>
            </div>
            <br><br><br><br>
            <div class="Citas">
                <div class="TipoCita">
                    <label for="TipoCita">Tipo De Cita</label>
                    <select id="TipoCita" name="TipoCita" class="form-control" required>
                        <option value="Presencial">Presencial</option>
                        <option value="Telemedicina">Telemedicina</option>
                    </select>
                </div>
                <div class="Fecha">
                    <label for="FechaCita">Fecha De Cita</label>
                    <input type="date" id="FechaCita" name="FechaCita" required>
                </div>
                <div class="Hora">
                    <label for="HoraCita">Hora De Cita</label>
                    <select id="HoraCita" name="HoraCita" class="form-control" required>
                        <option value="08:00">08:00 AM -- 09:00 AM</option>
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
            <br><br><br><br><br>
            <div class="Motivo-y-Guardar">
                <div class="Motivo">
                    <label for="Motivo">Motivo</label>
                    <input type="text" id="Motivo" name="Motivo" placeholder="Motivo de la Cita" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <img src="imagenes/boton guardar 3.png" alt="Guardar" class="Boton Guardar" height="50">
                    <br> Guardar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
