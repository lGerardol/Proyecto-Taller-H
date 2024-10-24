<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$categoria = $_GET['categoria'];

// Obtener equipos de la categoría seleccionada
$query = "SELECT id, nombre_maquina FROM nuevo_equipo WHERE categoria = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $categoria);
$stmt->execute();
$resultado = $stmt->get_result();

$equipos = [];
while ($fila = $resultado->fetch_assoc()) {
    $equipos[] = $fila;
}

echo json_encode($equipos);

// Cerrar conexión
$conexion->close();
?>
