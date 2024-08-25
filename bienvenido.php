<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <!-- Agregar los enlaces a los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">¡Bienvenido!</h4>
          </div>
          <div class="card-body">
            <p>Has iniciado sesión correctamente como <strong><?php session_start(); echo $_SESSION["usuario"]; ?></strong>.</p>
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Agregar el enlace al script de Bootstrap (requerido para algunos componentes interactivos) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!--//' OR '1'='1-->