<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Reporte de Fallas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <h2 class="text-center mb-4">Registro de Usuario</h2>
            <form action="" method="post">
                <!-- Campos del formulario -->
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        <option value="encargado">Encargado</option>
                        <option value="director">Director</option>
                    </select>
                </div>
                <!-- Botón de registro -->
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
            <!-- Enlace para ir al inicio de sesión -->
            <div class="mt-3 text-center">
                <a href="/reporte_fallas/Login/login.php" class="btn btn-link">Ir al inicio de sesión</a>
            </div>
        </div>
    </div>

    <?php
    // Conexión a la base de datos
    $servername = "localhost"; // O "127.0.0.1"
    $username = "root"; // Cambia esto si tienes otro nombre de usuario
    $password = ""; // La contraseña que utilizas para phpMyAdmin
    $dbname = "reporte_fallas"; // Nombre de tu base de datos

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar si se han enviado los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol'];

        // Verificar si los campos están completos
        if (!empty($usuario) && !empty($contraseña) && !empty($rol)) {
            // Encriptar la contraseña para mayor seguridad
            $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

            // SQL para insertar los datos
            $sql = "INSERT INTO registro (usuario, contraseña, rol) VALUES ('$usuario', '$contraseña_encriptada', '$rol')";

            // Ejecutar la consulta y verificar si se insertaron los datos
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Registro exitoso. <a href='login.html'>Ir al inicio de sesión</a></div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning mt-3'>Por favor, completa todos los campos.</div>";
        }
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
