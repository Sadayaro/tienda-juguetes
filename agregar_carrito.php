<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$producto = $_POST['producto'];
$cantidad = intval($_POST['cantidad']);

if (!isset($_SESSION['carrito'][$producto])) {
    $_SESSION['carrito'][$producto] = $cantidad;
} else {
    $_SESSION['carrito'][$producto] += $cantidad;
}

header("Location: tienda.php");
exit();
?>