<?php
// Configurar conexión a la base de datos
$host = "localhost"; // Cambia si es necesario
$dbname = "reporte_fallas"; // Nombre de tu base de datos
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario

try {
    // Crear conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la declaración de inserción
    $stmt = $conn->prepare("INSERT INTO orden_trabajo (
        numero_orden,
        codigo_equipo,
        nombre_equipo,
        descripcion_falla,
        fecha_hora_reportada,
        prioridad,
        nombre_reportante,
        detalles_trabajo_realizado,
        fecha_inicio_mantenimiento,
        fecha_finalizacion_mantenimiento,
        materiales_utilizados,
        descripcion_trabajo_realizado,
        fecha
    ) VALUES (
        :numero_orden,
        :codigo_equipo,
        :nombre_equipo,
        :descripcion_falla,
        :fecha_hora_reportada,
        :prioridad,
        :nombre_reportante,
        :detalles_trabajo_realizado,
        :fecha_inicio_mantenimiento,
        :fecha_finalizacion_mantenimiento,
        :materiales_utilizados,
        :descripcion_trabajo_realizado,
        :fecha
    )");

    // Asignar los valores a los parámetros
    $stmt->bindParam(':numero_orden', $_POST['numero_orden']);
    $stmt->bindParam(':codigo_equipo', $_POST['codigo_equipo']);
    $stmt->bindParam(':nombre_equipo', $_POST['nombre_equipo']);
    $stmt->bindParam(':descripcion_falla', $_POST['descripcion_falla']);
    $stmt->bindParam(':fecha_hora_reportada', $_POST['fecha_hora']);
    $stmt->bindParam(':prioridad', $_POST['prioridad']);
    $stmt->bindParam(':nombre_reportante', $_POST['nombre_reportante']);
    $stmt->bindParam(':detalles_trabajo_realizado', $_POST['detalles_trabajo_realizado']);
    $stmt->bindParam(':fecha_inicio_mantenimiento', $_POST['fecha_inicio_mantenimiento']);
    $stmt->bindParam(':fecha_finalizacion_mantenimiento', $_POST['fecha_finalizacion_mantenimiento']);
    $stmt->bindParam(':materiales_utilizados', $_POST['materiales_utilizados']);
    $stmt->bindParam(':descripcion_trabajo_realizado', $_POST['descripcion_trabajo_realizado']);
    $stmt->bindParam(':fecha', $_POST['fecha']);

    // Ejecutar la declaración
    $stmt->execute();

    echo "La orden de trabajo se ha registrado exitosamente.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar conexión
$conn = null;
?>
