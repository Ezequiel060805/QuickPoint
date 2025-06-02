<?php
session_start(); 
if (!isset($_SESSION['IdPaciente'])) {
    header('Location: login.php');
    exit();
}

include('conexion.php');
$conn = connection();

$IdPaciente = $_SESSION['IdPaciente'];

$stmt = $conn->prepare("CALL datosPaciente(?)");
if ($stmt === false) {
    die("Error en la preparación: " . $conn->error);
}

$stmt->bind_param("i", $IdPaciente);
$execResult = $stmt->execute();
if ($execResult === false) {
    die("Error en la ejecución: " . $stmt->error);
}

$result = $stmt->get_result();
if ($result === false) {
    die("Error al obtener el resultado: " . $stmt->error);
}

$row = $result->fetch_assoc();
if (!$row) {
    die("No se encontraron datos para el ID de paciente proporcionado.");
}

$stmt->close();
$conn->close();