<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Verificar si se ha proporcionado un ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para evitar inyección SQL
    // Obtener la información del equipo específico
    $query = "SELECT * FROM nuevo_equipo WHERE id = $id";
    $resultado = $conexion->query($query);

    // Verificar si se encontró el equipo
    if ($resultado->num_rows > 0) {
        $equipo = $resultado->fetch_assoc();
    } else {
        die("Equipo no encontrado.");
    }
} else {
    die("ID de equipo no especificado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Equipo</title>
    <!-- Incluir Bulma desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: #dea632;
        }
        .navbar.is-light .navbar-item {
            color: #fff;
        }
        .navbar.is-light .navbar-item:hover {
            color: #b1291d;
        }
        .footer {
            background-color: #b1291d;
            color: #fff;
            padding: 5px 0;
            font-size: 0.9rem;
            margin-top: auto;
        }
        .box {
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo">
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="title">Detalles del Equipo</h1>
        <div class="box">
            <h2 class="subtitle">Información del Equipo</h2>
            <p><strong>Nombre de la Máquina:</strong> <?php echo $equipo['nombre_maquina']; ?></p>
            <p><strong>Marca:</strong> <?php echo $equipo['marca']; ?></p>
            <p><strong>Modelo:</strong> <?php echo $equipo['modelo']; ?></p>
            <p><strong>Código:</strong> <?php echo $equipo['codigo']; ?></p>
            <p><strong>Estado:</strong> <?php echo $equipo['estado']; ?></p>
            <?php if ($equipo['imagen']): ?>
                <img src="uploads/<?php echo $equipo['imagen']; ?>" alt="Imagen del equipo" style="max-width: 100%; height: auto;">
            <?php endif; ?>
        </div>

        <a class="button is-link" href="disponibilidad_equipos.php">Volver al Inventario</a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>© 2024 Tu Taller. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>

<?php
// Cerrar conexión
$conexion->close();
?>
