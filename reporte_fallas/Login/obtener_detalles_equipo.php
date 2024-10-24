<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener el ID del equipo desde la solicitud
$id_equipo = $_GET['id'];

// Consulta para obtener los detalles del equipo
$query = "SELECT nombre_maquina, marca, modelo, codigo, estado FROM nuevo_equipo WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_equipo);
$stmt->execute();
$resultado = $stmt->get_result();

// Devolver los detalles del equipo en formato JSON
$equipo = $resultado->fetch_assoc();
echo json_encode($equipo);

// Cerrar la conexión
$conexion->close();
?>
