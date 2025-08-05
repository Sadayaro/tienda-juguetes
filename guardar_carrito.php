<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$producto_id = $_POST['producto_id'];
$cantidad = intval($_POST['cantidad']);
$monto_total = floatval($_POST['monto_total']);

// Validar disponibilidad de stock
$consulta = $conexion->query("SELECT cantidad FROM juguetes WHERE id = $producto_id");
$producto = $consulta->fetch_assoc();

if ($producto['cantidad'] < $cantidad) {
    echo "No hay suficiente stock disponible.";
    exit();
}

// Insertar en tabla carrito
$stmt = $conexion->prepare("INSERT INTO carrito (usuario_id, producto_id, cantidad, monto_total) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiid", $usuario_id, $producto_id, $cantidad, $monto_total);

if ($stmt->execute()) {
    echo "Producto agregado al carrito.";
} else {
    echo "Error al guardar en la base de datos.";
}

$stmt->close();
$conexion->close();
?>