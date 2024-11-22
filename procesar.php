<?php
// Incluir el archivo de conexión
include("conexion.php");

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $cedula = htmlspecialchars($_POST['cedula']);
    $correo = htmlspecialchars($_POST['correo']);
    $contrasena = htmlspecialchars($_POST['contrasena']);
    $confirmar = htmlspecialchars($_POST['confirmar']);

    // Validar que las contraseñas coincidan
    if ($contrasena !== $confirmar) {
        die("Las contraseñas no coinciden. <a href='index.html'>Volver</a>");
    }

    // Encriptar la contraseña antes de guardarla
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (cedula, correo, contrasena) VALUES ('$cedula', '$correo', '$contrasena_encriptada')";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario creado exitosamente. <a href='index.html'>Volver</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Acceso no autorizado.";
}
?>
