<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener las categorías de las tablas de la base de datos
$categorias = ['Compresores', 'Cortadora', 'Dobladora', 'Esmeriles', 'Fresadoras', 'Guillotinas', 'Limadoras', 'Motores', 'Prensas', 'Rectificadoras', 'Soldadores', 'Taladros', 'Tornos'];

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_reporte'])) {
    // Capturar los datos del formulario
    $categoria = $_POST['categoria'];
    $nombre_equipo = $_POST['equipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $codigo = $_POST['codigo'];
    $descripcion_falla = $_POST['descripcion_falla'];
    $fecha_hora = $_POST['fecha_hora'];
    $prioridad = $_POST['prioridad'];

    // Insertar los datos en la tabla reportes_fallas_completo
    $query = "INSERT INTO reportes_fallas_completo 
              (categoria, nombre_equipo, marca, modelo, codigo, descripcion_falla, fecha_hora, prioridad) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssssss", $categoria, $nombre_equipo, $marca, $modelo, $codigo, $descripcion_falla, $fecha_hora, $prioridad);

    if ($stmt->execute()) {
        $mensaje = "Reporte de falla guardado exitosamente.";
    } else {
        $mensaje = "Error al guardar el reporte: " . $conexion->error;
    }
}

// Función para obtener los equipos de la categoría seleccionada (se envía la categoría desde el formulario por AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    // Consulta para obtener los equipos de la categoría seleccionada
    $query_equipos = "SELECT * FROM $categoria";
    $resultado_equipos = $conexion->query($query_equipos);

    $equipos = [];
    while ($fila = $resultado_equipos->fetch_assoc()) {
        $equipos[] = $fila;
    }

    // Enviar respuesta JSON para la solicitud AJAX
    header('Content-Type: application/json');
    echo json_encode($equipos);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Falla del Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    <style>
        .navbar-top {
            background-color: #dea632;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-bottom {
            background-color: #b1291d;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .navbar-logo img {
            max-height: 50px;
            vertical-align: middle;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Barra superior -->
<div class="navbar-top">
    <div class="navbar-logo">
        <img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo">
    </div>
    <div>
        <a href="principal.php" class="button is-danger">Regresar a Principal</a>
    </div>
</div>

<div class="container">
    <h1 class="title">Reportar Falla del Equipo</h1>

    <?php if (isset($mensaje)): ?>
        <div class="notification is-primary"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <!-- Seleccionar Categoría -->
        <div class="field">
            <label class="label">Categoría del Equipo</label>
            <div class="control">
                <div class="select">
                    <select id="categoria" name="categoria" required onchange="cargarEquipos()">
                        <option value="">Seleccione una categoría</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?php echo strtolower($categoria); ?>">
                                <?php echo $categoria; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Seleccionar Equipo -->
        <div class="field">
            <label class="label">Equipo</label>
            <div class="control">
                <div class="select">
                    <select id="equipo" name="equipo" required onchange="mostrarDetallesEquipo()">
                        <option value="">Seleccione un equipo</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Campos adicionales para mostrar los detalles del equipo seleccionado -->
        <div class="field">
            <label class="label">Marca del Equipo</label>
            <div class="control">
                <input id="marcaEquipo" class="input" type="text" name="marca" readonly>
            </div>
        </div>

        <div class="field">
            <label class="label">Modelo del Equipo</label>
            <div class="control">
                <input id="modeloEquipo" class="input" type="text" name="modelo" readonly>
            </div>
        </div>

        <div class="field">
            <label class="label">Código del Equipo</label>
            <div class="control">
                <input id="codigoEquipo" class="input" type="text" name="codigo" readonly>
            </div>
        </div>

        <!-- Descripción de la Falla -->
        <div class="field">
            <label class="label">Descripción de la Falla</label>
            <div class="control">
                <textarea class="textarea" name="descripcion_falla" placeholder="Describa la falla" maxlength="500" required></textarea>
            </div>
        </div>

        <!-- Fecha y Hora -->
        <div class="field">
            <label class="label">Fecha y Hora</label>
            <div class="control">
                <input class="input" type="datetime-local" name="fecha_hora" required>
            </div>
        </div>

        <!-- Prioridad -->
        <div class="field">
            <label class="label">Prioridad</label>
            <div class="control">
                <div class="select">
                    <select name="prioridad" required>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botón Enviar (Centrado) -->
        <div class="field">
            <div class="control" style="text-align: center; margin-top: 20px;">
                <button type="submit" name="enviar_reporte" class="button is-success is-large">Enviar Reporte</button>
            </div>
        </div>
    </form>
</div>

<!-- Barra inferior -->
<div class="navbar-bottom">
    <p style="color: white; text-align: center;">&copy; 2024 Reporte de Fallas - Todos los derechos reservados</p>
</div>

<script>
    function cargarEquipos() {
        var categoria = document.getElementById('categoria').value;
        var equipoSelect = document.getElementById('equipo');

        equipoSelect.innerHTML = '<option value="">Seleccione un equipo</option>'; // Limpiar el menú de equipos

        if (categoria) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var equipos = JSON.parse(xhr.responseText);
                    
                    // Mostrar los equipos en el select
                    equipos.forEach(function (equipo) {
                        var option = document.createElement('option');
                        option.value = equipo.id; // Usamos el ID para identificar el equipo
                        option.textContent = equipo.nombre; // Mostramos el nombre del equipo
                        equipoSelect.appendChild(option);
                    });
                }
            };
            xhr.send('categoria=' + encodeURIComponent(categoria));
        }
    }

    function mostrarDetallesEquipo() {
        var equipoSeleccionado = document.getElementById('equipo').value;
        var categoria = document.getElementById('categoria').value;

        if (equipoSeleccionado) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var equipos = JSON.parse(xhr.responseText);
                    var equipo = equipos.find(e => e.id == equipoSeleccionado); // Buscamos el equipo por ID
                    if (equipo) {
                        // Asignar los detalles del equipo a los campos correspondientes
                        document.getElementById('marcaEquipo').value = equipo.marca;
                        document.getElementById('modeloEquipo').value = equipo.modelo;
                        document.getElementById('codigoEquipo').value = equipo.codigo;
                    }
                }
            };
            xhr.send('categoria=' + encodeURIComponent(categoria));
        }
    }
</script>

</body>
</html>

<?php
// Cerrar conexión
$conexion->close();
?>
