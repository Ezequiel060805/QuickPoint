<?php
    include ('conexion.php');
    $conn = connection();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $fechaCita = $_POST['FechaCita'];
        $stmt = mysqli_prepare($conn, "CALL SelectCitas(?)");
        mysqli_stmt_bind_param($stmt, 's', $fechaCita);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil </title>
    <link rel="stylesheet" href="StyleReportes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body><div class="header">
    <h1><a href="Menu.php" class="navbar-link"> Clinica San Pedro</a>
        <img src="Imagenes/QuickPoint.png" class="quickPoint" alt="Logo QuickPoint">
        <img src="Imagenes/Vortex_Digital.png" class="vortex" alt="Vortex Digital Logo">
        <a href="Login.php">
            <img src="Imagenes/Login.png" class="login" alt="Imagen Login">
        </a>
    </h1>
</div>
<!----
<div class="sidebar"> 
    <h2>Reportes</h2> <br>
    <ul>
    <li><a href="PerfilMedico.php">Perfil </a></li> <br>
    <li><a href="ReportesGen.php">Nombre y Sexo</a></li> <br>
    <li><a href="ReporteEnf.php">Enfermedades</a></li> <br>
    <li><a href="Cancelaciones.php">Cancelaciones</a> </li>
    </ul> 
</div>--->
<nav class="menu-lateral">
            <h2>Menú</h2>
            <a href="PerfilMedico.php" class="boton">Perfil </a>
            <a href="ReportesGen.php" class="boton">Nombre y Sexo</a>
            <a href="ReporteEnf.php" class="boton">Enfermedades</a>
            <a href="Cancelaciones.php" class="boton">Cancelaciones</a>
        </nav>
<div class="fechacitas">
    <form method="POST">
    <label for="FechaCita">Fecha: </label> 
    <input type="date" id="FechaCita" name="FechaCita">

    <button type="submit">Buscar</button>
    </form>
</div>
<div>
    <table class="consultas">
    <thead> 
        <tr> 
            <th>Nombre</th> 
            <th>Hora de la Cita</th>
            <th>Motivo </th>
            <th>Tipo de cita </th> 
        </tr> </thead> 
        <tbody>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $result) { 
            while ($row = mysqli_fetch_assoc($result)) { 
                echo "<tr>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['HoraCita'] . "</td>";
                echo "<td>" . $row['Motivo'] . "</td>";
                echo "<td>" . $row['TipoCita'] . "</td>";
                echo "</tr>"; 
            } 
            mysqli_stmt_close($stmt); 
            mysqli_close($conn); 
        } 
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
