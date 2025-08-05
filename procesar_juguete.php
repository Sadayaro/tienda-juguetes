<?php
$conexion = new mysqli("localhost", "root", "", "TOYS");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$edad = $_POST['edad'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO juguetes (nombre, descripcion, edad, precio, cantidad) 
        VALUES ('$nombre', '$descripcion', '$edad', '$precio', '$cantidad')";

if ($conexion->query($sql) === TRUE) {
    echo "Juguete registrado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>