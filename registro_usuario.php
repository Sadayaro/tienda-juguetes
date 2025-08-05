<!-- archivo: registro_usuario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Registro de Usuario</h2>
  <form action="procesar_usuario.php" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo:</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña:</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección:</label>
      <input type="text" class="form-control" name="direccion" required>
    </div>
    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono:</label>
      <input type="text" class="form-control" name="telefono" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
  </form>
</div>
</body>
</html>