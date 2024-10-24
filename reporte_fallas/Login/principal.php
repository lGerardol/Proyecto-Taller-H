<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - Sistema de Reporte de Fallas</title>

    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-mostaza {
            background-color: #dea632;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-title {
            font-family: 'Lora', serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin: 0 auto;
        }

        .container-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 15px;
            padding: 20px;
        }

        .button-row {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .button-custom {
            background-color: #ead298;
            color: #333;
            font-weight: bold;
            font-family: 'Lora', serif;
            border-radius: 12px;
            padding: 25px 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 280px;
            height: 130px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-align: center;
            white-space: normal;
            font-size: 1.1em;
        }

        .button-custom:hover {
            background-color: #d1b576;
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .button-custom img {
            max-width: 60px;
            margin-right: 15px;
        }

        .footer-terracota {
            background-color: #b1291d;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .button-navbar {
            background-color: #007bff;
            color: white;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button-navbar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-mostaza" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo" style="max-height: 80px;">
            </a>
        </div>
        <div class="navbar-end">
            <a href="#" class="navbar-item has-text-dark">Inicio</a>
            <button class="button-navbar" onclick="window.location.href='soporte.php'">Ayuda</button>
            <a href="#" class="navbar-item has-text-dark">Contacto</a>
        </div>
    </nav>

    <!-- Título centrado -->
    <div class="navbar-title">Gestión de Equipos y Reporte de Fallas del Taller H</div>

    <!-- Contenido Principal -->
    <div class="container container-main">
        <!-- Fila superior con tres botones -->
        <div class="button-row">
            <a href="ingresar_reporte.php" class="button button-custom">
                <img src="http://localhost/reporte_fallas/Login/img/reporte falla.png" alt="Reporte de Falla">
                Reporte de Falla
            </a>
            <a href="disponibilidad_equipos.php" class="button button-custom">
                <img src="http://localhost/reporte_fallas/Login/img/disponibilidad.png" alt="Disponibilidad de Equipos">
                Disponibilidad de Equipos
            </a>
            <a href="inventario.php" class="button button-custom">
                <img src="http://localhost/reporte_fallas/Login/img/inventario.png" alt="Inventario">
                Inventario
            </a>
        </div>
        <!-- Fila inferior con dos botones -->
        <div class="button-row">
            <a href="historial_fallas.php" class="button button-custom">
                <img src="http://localhost/reporte_fallas/Login/img/historial.png" alt="Historial de Fallas">
                Historial de Fallas
            </a>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="footer footer-terracota">
        &copy; 2024 TechCare | Todos los derechos reservados
    </footer>

</body>
</html>
