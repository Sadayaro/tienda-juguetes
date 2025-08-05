<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$id = $_GET['id'];
$conexion->query("DELETE FROM carrito WHERE id = $id AND usuario_id = {$_SESSION['usuario_id']}");
header("Location: carrito.php");
?>