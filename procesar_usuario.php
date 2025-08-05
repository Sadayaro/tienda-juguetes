<?php
$conexion = new mysqli("localhost", "root", "", "TOYS");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO usuarios (nombre, email, contraseña, direccion, telefono) 
        VALUES ('$nombre', '$email', '$password', '$direccion', '$telefono')";

if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>