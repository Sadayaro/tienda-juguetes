<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "TOYS");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    
    if (password_verify($password, $usuario['contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['carrito'] = []; // inicializa el carrito vacío
        header("Location: tienda.php");
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$conexion->close();
?>