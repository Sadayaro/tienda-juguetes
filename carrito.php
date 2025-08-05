<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// Obtener juguetes desde la BD para el select
$juguetes = $conexion->query("SELECT * FROM juguetes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    function calcularTotal() {
      const precio = parseFloat(document.getElementById('precio').value) || 0;
      const cantidad = parseInt(document.getElementById('cantidad').value) || 0;
      document.getElementById('monto_total').value = (precio * cantidad).toFixed(2);
    }
  </script>
</head>
<body>
<div class="container mt-5">
  <h2>Agregar al Carrito</h2>
  <form action="guardar_carrito.php" method="POST" oninput="calcularTotal()">
    <div class="mb-3">
      <label for="producto" class="form-label">Selecciona un juguete:</label>
      <select name="producto_id" id="producto" class="form-select" onchange="document.getElementById('precio').value=this.selectedOptions[0].dataset.precio; calcularTotal();" required>
        <option disabled selected>Seleccione...</option>
        <?php while($row = $juguetes->fetch_assoc()): ?>
          <option value="<?= $row['id'] ?>" data-precio="<?= $row['precio'] ?>">
            <?= $row['nombre'] ?> (Edad: <?= $row['edad'] ?>, $<?= $row['precio'] ?>)
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <input type="hidden" id="precio" value="0">

    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad:</label>
      <input type="number" class="form-control" name="cantidad" id="cantidad" min="1" value="1" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Monto Total:</label>
      <input type="text" class="form-control" id="monto_total" name="monto_total" readonly>
    </div>

    <button type="submit" class="btn btn-success">Agregar al carrito</button>
  </form>
</div>
</body>
</html>