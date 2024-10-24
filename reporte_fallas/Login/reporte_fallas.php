<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener las categorías de las tablas de la base de datos
$categorias = ['Compresores', 'Cortadora', 'Dobladora', 'Esmeriles', 'Fresadoras', 'Guillotinas', 'Limadoras', 'Motores', 'Prensas', 'Rectificadoras', 'Soldadores', 'Taladros', 'Tornos'];

// Función para obtener los equipos de la categoría seleccionada (se envía la categoría desde el formulario por AJAX)
if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    $query_equipos = "SELECT * FROM $categoria";
    $resultado_equipos = $conexion->query($query_equipos);
    
    $equipos = [];
    while ($fila = $resultado_equipos->fetch_assoc()) {
        $equipos[] = $fila;
    }
    
    // Enviar respuesta JSON a la solicitud AJAX
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
                    <select id="equipo" name="equipo" required>
                        <option value="">Seleccione un equipo</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Mostrar los detalles del equipo -->
        <div id="detallesEquipo" style="display: none;">
            <h2 class="subtitle">Detalles del Equipo Seleccionado</h2>
            <p><strong>Nombre:</strong> <span id="nombreEquipo"></span></p>
            <p><strong>Marca:</strong> <span id="marcaEquipo"></span></p>
            <p><strong>Modelo:</strong> <span id="modeloEquipo"></span></p>
            <p><strong>Código:</strong> <span id="codigoEquipo"></span></p>
            <p><strong>Estado:</strong> <span id="estadoEquipo"></span></p>
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

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-success is-fullwidth">Enviar Reporte</button>
            </div>
        </div>
    </form>
</div>

<!-- Barra inferior -->
<div class="navbar-bottom">
    <p style="color: white; text-align: center;">&copy; 2024 Reporte de Fallas - Todos los derechos reservados</p>
</div>

<script>
    var nombreEquipo, marcaEquipo, modeloEquipo, codigoEquipo, estadoEquipo;

    function cargarEquipos() {
        var categoria = document.getElementById('categoria').value;
        var equipoSelect = document.getElementById('equipo');
        var detallesEquipo = document.getElementById('detallesEquipo');

        // Limpiar el select de equipos
        equipoSelect.innerHTML = '<option value="">Seleccione un equipo</option>';

        if (categoria) {
            // Llamar al servidor por AJAX para obtener los equipos de la categoría seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var equipos = JSON.parse(xhr.responseText);
                    
                    // Mostrar los equipos en el select
                    equipos.forEach(function (equipo) {
                        var option = document.createElement('option');
                        option.value = equipo.id; // Ajustamos el valor al ID del equipo
                        option.textContent = equipo.nombre; // Mostramos el nombre del equipo
                        equipoSelect.appendChild(option);
                    });

                    // Mostrar detalles del primer equipo (opcional)
                    if (equipos.length > 0) {
                        mostrarDetallesEquipo(equipos[0]);
                    }
                }
            };
            xhr.send('categoria=' + encodeURIComponent(categoria));
        } else {
            detallesEquipo.style.display = 'none';
        }
    }

    function mostrarDetallesEquipo(equipo) {
        // Almacenar los datos en variables
        nombreEquipo = equipo.nombre;
        marcaEquipo = equipo.marca;
        modeloEquipo = equipo.modelo;
        codigoEquipo = equipo.codigo;
        estadoEquipo = equipo.estado;

        // Mostrar los detalles en pantalla
        document.getElementById('nombreEquipo').textContent = nombreEquipo;
        document.getElementById('marcaEquipo').textContent = marcaEquipo;
        document.getElementById('modeloEquipo').textContent = modeloEquipo;
        document.getElementById('codigoEquipo').textContent = codigoEquipo;
        document.getElementById('estadoEquipo').textContent = estadoEquipo;

        // Hacer visible el bloque de detalles
        document.getElementById('detallesEquipo').style.display = 'block';
    }

    document.getElementById('equipo').addEventListener('change', function () {
        var equipoSeleccionado = this.value;
        var categoria = document.getElementById('categoria').value;

        // Llamar nuevamente al servidor para obtener los detalles del equipo seleccionado
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                var equipos = JSON.parse(xhr.responseText);
                var equipo = equipos.find(e => e.id == equipoSeleccionado);
                if (equipo) {
                    mostrarDetallesEquipo(equipo);
                }
            }
        };
        xhr.send('categoria=' + encodeURIComponent(categoria));
    });
</script>

</body>
</html>
