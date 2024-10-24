<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "reporte_fallas");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Listado de tablas que quieres mostrar
$tablas = ['compresores', 'cortadora', 'dobladoras', 'esmeriles', 'fresadoras', 'guillotinas', 'limadoras', 'motores', 'prensas', 'rectificadoras', 'soldadores', 'taladros', 'tornos'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disponibilidad de Equipos</title>
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
        .card {
            margin: 20px 0;
            position: relative;
        }
        .status-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }
        .status-en-uso {
            background-color: green;
        }
        .status-fuera-de-uso {
            background-color: red;
        }
        .status-en-reparacion {
            background-color: yellow;
        }
        /* Restauramos el estilo de las categorías */
        .category-title {
            font-weight: bold;
            font-size: 2rem;
            color: #b1291d;
        }
        /* Separar categorías con un margen */
        .category-container {
            margin-top: 30px;
            margin-bottom: 50px;
            padding: 20px;
            border: 2px solid #b1291d;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="navbar-top">
        <div class="navbar-logo">
            <img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo">
        </div>
        <div>
            <a href="principal.php" class="button is-danger">Regresar al Menú Principal</a>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="title">Disponibilidad de Equipos</h1>

        <?php foreach ($tablas as $tabla): ?>
            <div class="category-container">
                <h2 class="category-title"><?php echo ucfirst($tabla); ?></h2>
                <div class="columns is-multiline">
                    <?php
                    // Obtener los equipos de cada tabla
                    $query = "SELECT * FROM $tabla";
                    $result = $conexion->query($query);

                    if ($result->num_rows > 0): 
                        while ($row = $result->fetch_assoc()): ?>
                            <div class="column is-one-third">
                                <div class="card">
                                    <?php 
                                        $estado_clase = '';
                                        if ($row['estado'] == 'En uso') {
                                            $estado_clase = 'status-en-uso';
                                        } elseif ($row['estado'] == 'Fuera de uso') {
                                            $estado_clase = 'status-fuera-de-uso';
                                        } elseif ($row['estado'] == 'En reparación') {
                                            $estado_clase = 'status-en-reparacion';
                                        }
                                    ?>
                                    <span class="status-indicator <?php echo $estado_clase; ?>"></span>
                                    
                                    <div class="card-content">
                                        <p><strong>Nombre de la Máquina:</strong> <?php echo $row['nombre']; ?></p>
                                        <p><strong>Marca:</strong> <?php echo $row['marca']; ?></p>
                                        <p><strong>Modelo:</strong> <?php echo $row['modelo']; ?></p>
                                        <p><strong>Código:</strong> <?php echo $row['codigo']; ?></p>
                                        <p><strong>Estado:</strong> <?php echo $row['estado']; ?></p>

                                        <?php if ($row['estado'] == 'Fuera de uso'): ?>
                                            <p><strong>Tiempo Fuera de Uso:</strong> <span class="tiempo-fuera-uso"></span></p>
                                        <?php endif; ?>

                                        <button onclick="mostrarModal('<?php echo $row['nombre']; ?>', '<?php echo $row['marca']; ?>', '<?php echo $row['modelo']; ?>', '<?php echo $row['codigo']; ?>', '<?php echo $row['estado']; ?>', '<?php echo $row['imagen_url']; ?>')" class="button is-info">Detalles</button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No se encontraron equipos en la tabla <?php echo $tabla; ?>.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php $conexion->close(); ?>
    </div>

    <div class="navbar-bottom">
        <p style="color: white; text-align: center;">&copy; 2024 Reporte de Fallas - Todos los derechos reservados</p>
    </div>

    <!-- Modal para mostrar detalles -->
    <div id="modal-detalles" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Detalles del Equipo</p>
                <button class="delete" aria-label="close" onclick="cerrarModal()"></button>
            </header>
            <section class="modal-card-body">
                <p><strong>Nombre:</strong> <span id="modal-nombre"></span></p>
                <p><strong>Marca:</strong> <span id="modal-marca"></span></p>
                <p><strong>Modelo:</strong> <span id="modal-modelo"></span></p>
                <p><strong>Código:</strong> <span id="modal-codigo"></span></p>
                <p><strong>Estado:</strong> <span id="modal-estado"></span></p>

                <!-- Sección para mostrar la imagen del equipo -->
                <p><strong>Imagen:</strong></p>
                <img id="modal-imagen" src="" alt="Imagen del equipo" style="max-width: 100%; display: none;"> <!-- Imagen oculta por defecto -->
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" onclick="cerrarModal()">Cerrar</button>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Establecemos la hora en la que el equipo pasó a "Fuera de uso"
            const tiempoFueraUso = new Date(); // Hora actual al cargar la página

            // Función para actualizar los contadores de "Tiempo Fuera de Uso"
            function actualizarContadores() {
                const elementos = document.querySelectorAll('.tiempo-fuera-uso');
                elementos.forEach(function (elemento) {
                    const ahora = new Date();
                    const diferencia = ahora - tiempoFueraUso; // Diferencia de tiempo en milisegundos

                    const segundos = Math.floor((diferencia / 1000) % 60);
                    const minutos = Math.floor((diferencia / (1000 * 60)) % 60);
                    const horas = Math.floor((diferencia / (1000 * 60 * 60)) % 24);
                    const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));

                    elemento.textContent = `${dias}d ${horas}h ${minutos}m ${segundos}s`;
                });
            }

            // Actualizar los contadores cada segundo
            setInterval(actualizarContadores, 1000);
        });

        // Función para mostrar el modal con los detalles
        function mostrarModal(nombre, marca, modelo, codigo, estado, imagenUrl) {
            document.getElementById('modal-nombre').textContent = nombre;
            document.getElementById('modal-marca').textContent = marca;
            document.getElementById('modal-modelo').textContent = modelo;
            document.getElementById('modal-codigo').textContent = codigo;
            document.getElementById('modal-estado').textContent = estado;

            // Mostrar imagen si hay URL
            if (imagenUrl) {
                document.getElementById('modal-imagen').src = imagenUrl;
                document.getElementById('modal-imagen').style.display = 'block';
            } else {
                document.getElementById('modal-imagen').style.display = 'none';
            }

            var modal = document.getElementById('modal-detalles');
            modal.classList.add('is-active');
        }

        // Función para cerrar el modal
        function cerrarModal() {
            var modal = document.getElementById('modal-detalles');
            modal.classList.remove('is-active');
        }
    </script>

</body>
</html>
