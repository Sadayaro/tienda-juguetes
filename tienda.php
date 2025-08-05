<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?>!</h2>
  <p><a href="cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a></p>
  
  <form action="agregar_carrito.php" method="POST" class="row g-3">
    <div class="col-md-6">
      <label for="producto" class="form-label">ID del Juguete:</label>
      <input type="number" name="producto" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label for="cantidad" class="form-label">Cantidad:</label>
      <input type="number" name="cantidad" class="form-control" required>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Agregar al carrito</button>
    </div>
  </form>

  <hr>

  <h3>Carrito Actual</h3>
  <?php
  if (empty($_SESSION['carrito'])) {
    echo "<p>El carrito está vacío.</p>";
  } else {
    echo "<ul>";
    foreach ($_SESSION['carrito'] as $id => $cant) {
      echo "<li>Producto ID: $id - Cantidad: $cant 
            <a href='eliminar_carrito.php?id=$id' class='btn btn-sm btn-outline-danger ms-2'>Eliminar</a>
            </li>";
    }
    echo "</ul>";
  }
  ?>
</div>
</body>
</html>