<?php
    include ('conexion.php');
    $conn = connection();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $NombreApellido = $_POST['NombreApellido'] ?? ''; 
        $Sexo = $_POST['Sexo'] ?? ''; 
     
    if ($Sexo != 'elegir') { 
        $stmt = mysqli_prepare($conn, "CALL SelectConsultasGenyNom(?, ?)"); 
    if (!$stmt) { 
            die('Error en la preparación de la consulta: ' . mysqli_error($conn)); 
    } 
    mysqli_stmt_bind_param($stmt, 'ss', $NombreApellido, $Sexo); 
    if (!mysqli_stmt_execute($stmt)) { 
        die('Error en la ejecución de la consulta: ' . mysqli_stmt_error($stmt)); 
    } 
    $result = mysqli_stmt_get_result($stmt); 
    if (!$result) { 
        die('Error al obtener los resultados: ' . mysqli_stmt_error($stmt)); 
    } 
}
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
<div class="contendo-gen"> 
    <div class="busqueda">
        <form method="POST">
        <label for="NombreApellido"> Nombre: </label> 
        <input type="text" id="NombreApellido" name="NombreApellido"> <br>

        <label>Sexo</label> <br>
        <input type="radio" id="Mujer" name="Sexo" value="Mujer"> 
        <label for="Mujer">Mujer</label> <br>

        <input type="radio" id="Hombre" name="Sexo" value="Hombre"> 
        <label for="Hombre">Hombre</label><br> 

        <button type="submit">Buscar</button> <br><br>
        </form>
    </div>
</div>
    <div>
    <table class="resultados-tabla"> 
        <thead> <tr> 
            <th>Nombre</th> 
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Tipo de sangre</th>
            <th>Estatura</th>
            <th>Peso</th>
            <th>Direccion</th>
            <th>Telefono de casa</th>
            <th>Telefono Movil</th>
            <th>Alergias</th>
            <th>Antecedentes</th>
        </tr> </thead>
        <tbody> 
       <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($result)) { 
    while ($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>"; 
        echo "<td>" . $row['NombreApellido'] . "</td>"; 
        echo "<td>" . $row['Sexo'] . "</td>";
        echo "<td>" . $row['Fecha_Nacimiento'] . "</td>";
        echo "<td>" . $row['Edad'] . "</td>";
        echo "<td>" . $row['TipoSangre'] . "</td>"; 
        echo "<td>" . $row['Estatura'] . "</td>"; 
        echo "<td>" . $row['Peso'] . "</td>";
        echo "<td>" . $row['Direccion'] . "</td>";
        echo "<td>" . $row['TelefonoCasa'] . "</td>";
        echo "<td>" . $row['TelefonoMovil'] . "</td>";
        echo "<td>" . $row['Alergias'] . "</td>";
        echo "<td>" . $row['Cirugias_Accidentes'] . "</td>";   
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
