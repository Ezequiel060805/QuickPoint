<?php
session_start();
if(!empty($_POST["Boton"])){
    if(!empty($_POST["Correo_Electronico"]) and !empty($_POST["Contrasena"])){
        $Correo_Electronico = $_POST['Correo_Electronico'];
        $Contrasena = $_POST['Contrasena'];
        
        // Ejecutar la consulta de inicio de sesión
        $sql = $conn->query("call InicioSesion('{$Correo_Electronico}','{$Contrasena}')");
        if($datos = $sql->fetch_object()){
            $_SESSION["IdPaciente"] = $datos->IdPaciente;
            $_SESSION["Correo_Electronico"] = $datos->Correo_Electronico;
            $_SESSION["Contrasena"] = $datos->Contrasena;
            
            // Verificar la terminación del correo electrónico
            if (strpos($Correo_Electronico, '@sanpedroclinic.mx') !== false) {
                header("location: PerfilMedico.php");
            } else {
                header("location: perfilPaciente.php");
            }
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        echo "Campos vacíos";
    }
}
?>
