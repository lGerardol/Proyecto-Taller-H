<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "", "reporte_fallas");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre_maquina = $_POST['nombre_maquina'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $codigo = $_POST['codigo'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];

    // Manejar la subida de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Definir la ruta de destino
        $rutaDestino = 'C:\\wamp64\\www\\reporte_fallas\\uploads\\' . basename($_FILES['imagen']['name']);

        // Mover el archivo subido
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            // Insertar los datos en la tabla 'nuevo_equipo'
            $query = "INSERT INTO nuevo_equipo (nombre_maquina, marca, modelo, imagen, codigo, estado, observaciones) 
                      VALUES ('$nombre_maquina', '$marca', '$modelo', '" . basename($_FILES['imagen']['name']) . "', '$codigo', '$estado', '$observaciones')";

            if ($conexion->query($query) === TRUE) {
                $mensaje_exito = "Equipo agregado correctamente";
            } else {
                $mensaje_error = "Error: " . $query . "<br>" . $conexion->error;
            }
        } else {
            $mensaje_error = "Error al mover el archivo.";
        }
    }

    // Cerrar conexión
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    <style>
        .navbar-top {
            background-color: #dea632;
            padding: 10px;
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
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar-top">
        <div class="navbar-logo">
            <img src="https://www.itca.edu.sv/wp-content/uploads/2024/01/Logo55Web_1700x379.png" alt="Logo">
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="title">Agregar Nuevo Equipo</h1>
        <form action="nuevo_equipo.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                <label class="label">Nombre de la Máquina</label>
                <div class="control">
                    <input class="input" type="text" name="nombre_maquina" placeholder="Nombre de la máquina" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Marca</label>
                <div class="control">
                    <input class="input" type="text" name="marca" placeholder="Marca del equipo" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Modelo</label>
                <div class="control">
                    <input class="input" type="text" name="modelo" placeholder="Modelo del equipo" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Código</label>
                <div class="control">
                    <input class="input" type="text" name="codigo" placeholder="Código del equipo" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Estado</label>
                <div class="control">
                    <input class="input" type="text" name="estado" placeholder="Estado del equipo" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Observaciones</label>
                <div class="control">
                    <textarea class="textarea" name="observaciones" placeholder="Observaciones adicionales"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">Imagen</label>
                <div class="control">
                    <input class="input" type="file" name="imagen" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-success">Agregar Equipo</button>
                </div>
            </div>
        </form>
    </div>

    <div class="navbar-bottom">
        <p style="color: white; text-align: center;">&copy; 2024 Reporte de Fallas - Todos los derechos reservados</p>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
            <p><?php echo isset($mensaje_exito) ? $mensaje_exito : ''; ?></p>
            <button class="button is-success" onclick="window.location.href='nuevo_equipo.php'">Aceptar</button>
        </div>
    </div>

    <script>
        <?php if (isset($mensaje_exito)) : ?>
            document.getElementById('myModal').style.display = 'block';
        <?php endif; ?>

        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
