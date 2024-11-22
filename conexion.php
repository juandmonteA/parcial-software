<?php
$host = "localhost"; // Servidor local
$usuario = "root";   // Usuario predeterminado en XAMPP
$contraseña = "";    // Contraseña vacía por defecto en XAMPP
$base_datos = "usuarios_db";

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
