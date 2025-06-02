<?php
session_start(); 
include('conexion.php');
$conn = connection();

if (!isset($_SESSION['IdPaciente'])) {
    header('Location: login.php');
    exit();
}

$IdPaciente = $_SESSION['IdPaciente'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Contrasena = !empty($_POST['Contrasena']) ? $_POST['Contrasena'] : NULL;
    $TelefonoMovil = !empty($_POST['TelefonoMovil']) ? $_POST['TelefonoMovil'] : NULL;
    $TelefonoCasa = !empty($_POST['TelefonoCasa']) ? $_POST['TelefonoCasa'] : NULL;
    $Enfermedades = !empty($_POST['Enfermedades']) ? $_POST['Enfermedades'] : NULL;
    $Cirugias_Accidentes = !empty($_POST['Cirugias_Accidentes']) ? $_POST['Cirugias_Accidentes'] : NULL;

    $stmt = $conn->prepare("CALL ModificarDatosPaciente(?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación: " . $conn->error);
    }

    $stmt->bind_param("isssss", $IdPaciente, $Contrasena, $TelefonoMovil, $TelefonoCasa, $Enfermedades, $Cirugias_Accidentes);
    $execResult = $stmt->execute();
    if ($execResult === false) {
        die("Error en la ejecución: " . $stmt->error);
    }
    header ("location: perfilPaciente.php");
    $stmt->close();
    $conn->close();
} else {
    echo "Método no soportado.";
}
?>
