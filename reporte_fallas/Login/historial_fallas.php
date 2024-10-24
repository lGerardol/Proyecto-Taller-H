<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Manejar la eliminación de un reporte si se presiona el botón "Terminar reporte"
if (isset($_POST['eliminar_reporte'])) {
    $id_reporte = $_POST['id_reporte'];
    
    // Eliminar el reporte de la tabla reportes_fallas_completo
    $query_eliminar = "DELETE FROM reportes_fallas_completo WHERE id = ?";
    $stmt = $conexion->prepare($query_eliminar);
    $stmt->bind_param("i", $id_reporte);

    if ($stmt->execute()) {
        $mensaje = "Reporte eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el reporte: " . $conexion->error;
    }
}

// Obtener los reportes de la tabla reportes_fallas_completo
$query = "
    SELECT id, categoria, nombre_equipo, marca, modelo, codigo, descripcion_falla, fecha_hora, prioridad
    FROM reportes_fallas_completo
    ORDER BY fecha_hora DESC
";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Fallas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #dea632;
        }
        .footer {
            background-color: #b1291d;
            padding: 10px;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        .table-container {
            margin-top: 30px;
        }
        .navbar-item-button {
            background-color: #ec5b6c; /* Color de fondo del botón */
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            font-size: 1rem;
        }
        .navbar-item-button:hover {
            background-color: #d24a5b;
        }
        .btn-terminar {
            background-color: #d9534f; /* Botón rojo */
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-terminar:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <!-- Barra superior -->
    <nav class="navbar navbar-light">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo" height="50">
            </a>
            <!-- Botón para regresar a la página principal -->
            <a href="principal.php" class="navbar-item-button">Regresar a Principal</a> 
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h1 class="display-4">Historial de Fallas</h1>

        <?php if (isset($mensaje)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive table-container">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Nombre del Equipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Código</th>
                        <th>Descripción de la Falla</th>
                        <th>Fecha y Hora del Reporte</th>
                        <th>Prioridad</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                                <td><?php echo htmlspecialchars($row['nombre_equipo']); ?></td>
                                <td><?php echo htmlspecialchars($row['marca']); ?></td>
                                <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                                <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($row['descripcion_falla']); ?></td>
                                <td><?php echo $row['fecha_hora']; ?></td>
                                <td><?php echo ucfirst($row['prioridad']); ?></td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="id_reporte" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="eliminar_reporte" class="btn-terminar">Terminar reporte</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="10" class="text-center">No se encontraron reportes de fallas.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Barra inferior -->
    <div class="footer">
        &copy; 2024 Reporte de Fallas - Todos los derechos reservados
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar conexión
$conexion->close();
?>
