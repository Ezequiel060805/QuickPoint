<?php
    include ('conexion.php');
    $conn = connection();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $Enfermedades = $_POST['Enfermedades'];
        $stmt = mysqli_prepare($conn, "CALL SelectConsultasEnf(?)"); 
        mysqli_stmt_bind_param($stmt, 's', $Enfermedades); 
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Generales</title>
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
<nav class="menu-lateral">
            <h2>Menú</h2>
            <a href="PerfilMedico.php" class="boton">Perfil </a>
            <a href="ReportesGen.php" class="boton">Nombre y Sexo</a>
            <a href="ReporteEnf.php" class="boton">Enfermedades</a>
            <a href="Cancelaciones.php" class="boton">Cancelaciones</a>
        </nav>
<div class="busquedaEnf">
    <form method="POST">
    <label for="Enfermedades">Enfermedad:</label> 
    <input type="text" id="Enfermedades" name="Enfermedades"> <br>

    <button type="submit">Buscar</button> <br><br>
    </form>
</div>
<div>
    <table class="tablaResul">
    <thead> <tr> 
            <th>Enfermedades</th> 
            <th>Nombre</th> 
        </tr> </thead>
        <tbody>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $result) { 
            while ($row = mysqli_fetch_assoc($result)) { 
                echo "<tr>";
                echo "<td>" . $row['Enfermedades'] . "</td>";
                echo "<td>" . $row['NombreApellido'] . "</td>";
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
