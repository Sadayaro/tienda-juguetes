<!-- archivo: registro_juguete.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Juguetes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Registro de Juguetes</h2>
  <form action="procesar_juguete.php" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
      <label class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción:</label>
      <textarea class="form-control" name="descripcion" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Edad recomendada:</label>
      <input type="number" class="form-control" name="edad" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Precio:</label>
      <input type="number" class="form-control" name="precio" step="0.01" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Cantidad en inventario:</label>
      <input type="number" class="form-control" name="cantidad" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Juguete</button>
  </form>
</div>
</body>
</html>