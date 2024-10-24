<?php
// Conexión a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "reporte_fallas"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soporte Técnico - Tech Care</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS externo -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0c0c0c;
            color: #fff;
        }

        header {
            background-color: #efefe3;
            color: white;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            margin-left: -20px;
            height: 130px;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin-right: 20px;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        /* Estilo para la sección de soporte */
        .soporte-section {
            padding: 40px;
            background-color: #181818;
        }

        .soporte-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .soporte-section h2 {
            color: #00c6ff;
            font-size: 24px;
        }

        .soporte-section a {
            color: #00c6ff;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .soporte-section a:hover {
            color: #ffeb3b;
        }

        .support-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
        }

        .faq-list {
            background-color: #202020;
            padding: 20px;
            border-radius: 10px;
        }

        .faq-list h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .faq-list a {
            display: block;
            margin-bottom: 10px;
            color: #007bff;
        }

        .faq-list a:hover {
            color: #ffeb3b;
        }

        .form-container {
            background-color: #202020;
            padding: 20px;
            border-radius: 10px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container form input, .form-container form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container form input[type="submit"] {
            background-color: #007bff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .additional-support {
            text-align: center;
            margin-top: 40px;
            background-color: #181818;
            padding: 30px;
        }

        .additional-support h3 {
            margin-bottom: 20px;
            color: #fff;
        }

        .additional-support a {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
        }

        .additional-support a:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #0c2350;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <!-- Barra horizontal con el logo a la izquierda y navegación -->
    <header>
        <img src="/tech_care/principal/img/techcare.png" alt="Logo de Tech Care">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="soporte.php">Soporte</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección de Soporte -->
    <section class="soporte-section">
        <h1>Soporte Técnico</h1>
        <div class="support-grid">
            <!-- Lista de temas frecuentes -->
            <div class="faq-list">
                <h2>Tendencias</h2>
                <a href="#">¿Cómo reportar un fallo en tu equipo?</a>
                <a href="#">Solución de problemas de conexión</a>
                <a href="#">Cómo gestionar tu inventario con TechCare</a>
                <a href="#">Preguntas frecuentes sobre el sistema</a>
                <a href="#">Guía de mantenimiento preventivo</a>
            </div>

            <!-- Formulario de Soporte -->
            <div class="form-container">
                <h2>Solicitar Ayuda</h2>
                <form action="submit_support.php" method="post">
                    <input type="text" name="nombre" placeholder="Tu Nombre" required>
                    <input type="email" name="email" placeholder="Tu Correo Electrónico" required>
                    <textarea name="mensaje" placeholder="Describe tu problema" rows="5" required></textarea>
                    <input type="submit" value="Enviar Solicitud">
                </form>
            </div>
        </div>
    </section>

    <!-- Sección de soporte adicional -->
    <section class="additional-support">
        <h3>¿No encuentras lo que buscas?</h3>
        <p>Consulta nuestras herramientas o contacta a nuestro equipo de soporte para obtener más ayuda.</p>
        <a href="contacto.php">Contacta con nosotros</a>
    </section>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Tech Care. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
