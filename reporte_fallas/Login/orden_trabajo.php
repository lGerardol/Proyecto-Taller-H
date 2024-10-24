<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$codigo_equipo = $_POST['codigo_equipo'];
$descripcion_falla = $_POST['descripcion_falla'];
$fecha_hora = $_POST['fecha_hora'];
$prioridad = $_POST['prioridad'];

// Obtener el ID del equipo por el código
$query_equipo = "SELECT id FROM nuevo_equipo WHERE codigo = ?";
$stmt_equipo = $conexion->prepare($query_equipo);
$stmt_equipo->bind_param("s", $codigo_equipo);
$stmt_equipo->execute();
$resultado_equipo = $stmt_equipo->get_result();
$equipo = $resultado_equipo->fetch_assoc();

if ($equipo) {
    $id_equipo = $equipo['id'];

    // Insertar el reporte en la tabla historial_fallas
    $query_falla = "INSERT INTO historial_fallas (id_equipo, descripcion_falla, fecha_hora, prioridad) 
                    VALUES (?, ?, ?, ?)";
    $stmt_falla = $conexion->prepare($query_falla);
    $stmt_falla->bind_param("isss", $id_equipo, $descripcion_falla, $fecha_hora, $prioridad);
    $stmt_falla->execute();

    // Actualizar el estado del equipo a "Fuera de uso"
    $query_actualizar = "UPDATE nuevo_equipo SET estado = 'Fuera de uso' WHERE id = ?";
    $stmt_actualizar = $conexion->prepare($query_actualizar);
    $stmt_actualizar->bind_param("i", $id_equipo);
    $stmt_actualizar->execute();

    echo "Reporte de falla registrado correctamente.";
} else {
    echo "Equipo no encontrado.";
}

// Cerrar conexión
$conexion->close();
?>
