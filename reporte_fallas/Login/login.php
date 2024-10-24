<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Reporte de Fallas</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .image-container {
            font-family: 'Poppins', sans-serif;
            background-image: url('../Login/img/foto.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form {
            width: 100%;
            max-width: 500px;
            text-align: center;
            padding: 100px;
            background-color: white;
            border-radius: 75px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .login-form img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .extra-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <!-- Div de la imagen -->
            <div class="col-md-6 image-container"></div>

            <!-- Div del formulario de login -->
            <div class="col-md-6 login-container">
                <div class="login-form">
                    <!-- Logo arriba del formulario -->
                    <img src="https://apps.itca.edu.sv/portalestudiantil/img/Logo_nuevo.png" alt="Logo">
                    <h2>Iniciar Sesión</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
                        <button type="submit" class="btn btn-secondary btn-block mt-2" name="register">Registrar</button>
                        <!-- Botones adicionales debajo del formulario -->
                        <div class="extra-buttons">
                            <button type="button" class="btn btn-link">Recuperar Contraseña</button>
                            <button type="button" class="btn btn-link">Soporte</button>
                        </div>
                    </form>
                    <div id="loginError" class="text-danger mt-3" style="display: none;">Usuario o contraseña incorrectos</div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        if (isset($_POST['register'])) {
            // Código para registro
        }

        if (isset($_POST['login'])) {
            // Ejemplo de autenticación, redirige si el login es correcto
            if ($usuario == "admin" && $contraseña == "1234") {
                header("Location: principal.php");
                exit;
            } else {
                echo "<script>document.getElementById('loginError').style.display = 'block';</script>";
            }
        }
    }
    ?>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>