<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            margin-top: 20px;
        }
        .category-card {
            text-align: center;
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            width: 220px; /* Aumentado ligeramente */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            background-color: #f9f9f9;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .category-card img {
            width: 100%; /* Mantener tamaño uniforme */
            height: 160px; /* Aumentar altura de las imágenes */
            object-fit: cover; /* Asegura que las imágenes mantengan proporción sin distorsionarse */
            border-bottom: 2px solid #000;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .category-title {
            font-weight: bold;      
            font-size: 1em;
            background-color: #3d3a40 ; /* Color uniforme para todos */
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .subcategories {
            margin-top: 10px;
            list-style-type: none;
            padding: 0;
            font-size: 0.9em;
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
        .navbar-mostaza {
            background-color: #dea632;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Estilo del botón, similar a la imagen */
        .navbar-item-button {
            background-color: #ec5b6c; /* Color de fondo del botón */
            color: #fff;
            border: none;
            padding: 10px 30px; /* Espaciado dentro del botón */
            border-radius: 10px; /* Bordes redondeados */
            font-weight: bold;
            text-decoration: none;
            font-size: 1rem;
        }
        .navbar-item-button:hover {
            background-color: #d24a5b; /* Color de fondo al pasar el ratón */
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

        <!-- Botón en la barra de navegación -->
        <div class="navbar-end">
            <div class="navbar-item">
                <a href="principal.php" class="navbar-item-button">Regresar a Principal</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="title has-text-centered">Categorías de Equipos</h1>
        <div class="category-container">
            <!-- Tarjetas de las categorías -->
            <div class="category-card">
                <a href="cortadora.php?categoria=Guillotinas">
                <img src="../Login/img/sierra.jpeg" alt="Sierras">
                    <div class="category-title">CORTADORA</div>
                </a>
            </div>
            <div class="category-card">
                <a href="dobladoras.php?categoria=Dobladoras">
                <img src="../Login/img/dobladora.jpeg" alt="Dobladoras">
                    <div class="category-title">DOBLADORAS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="motores.php?categoria=Motores+Eléctricos">
                <img src="../Login/img/motor.jpg" alt="Motores">
                    <div class="category-title">MOTORES ELÉCTRICOS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="taladros.php?categoria=Taladros">
                <img src="../Login/img/taladro.jpeg" alt="Taladros">
                    <div class="category-title">TALADROS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="prensas.php?categoria=Prensas">
                <img src="../Login/img/prensa.jpg" alt="Prensas">
                    <div class="category-title">PRENSAS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="compresor.php?categoria=Compresores">
                <img src="../Login/img/compresor.jpg" alt="Compresores">
                    <div class="category-title">COMPRESORES</div>
                </a>
            </div>
            <div class="category-card">
                <a href="limadoras.php?categoria=Limadoras">
                <img src="../Login/img/limadora.jpg" alt="Limadoras">
                    <div class="category-title">LIMADORAS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="tornos.php?categoria=Tornos">  
                <img src="../Login/img/TORNO.jpeg" alt="Tornos">

                    <div class="category-title">TORNOS</div>
                </a>
                <ul class="subcategories">
                    
                </ul>
            </div>
            <div class="category-card">
                <a href="fresadoras.php?categoria=Fresadoras">
                <img src="../Login/img/fresadora.jpeg" alt="Fresadoras">
                    <div class="category-title">FRESADORAS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="soldadores.php?categoria=Equipos+Soldadores">
                <img src="../Login/img/soldador.jpg" alt="Equipos Soldadores">
                    <div class="category-title">EQUIPOS SOLDADORES</div>
                </a>
            </div>
            <div class="category-card">
                <a href="esmeriles.php?categoria=Esmeriles">
                <img src="../Login/img/esmeril.jpg" alt="Esmeriles">
                    <div class="category-title">ESMERILES</div>
                </a>
            </div>
            <div class="category-card">
                <a href="rectificadora.php?categoria=Rectificadoras">
                <img src="../Login/img/rectificadora.jpg" alt="Rectificadores">
                    <div class="category-title">RECTIFICADORAS</div>
                </a>
            </div>
            <div class="category-card">
                <a href="guillotina.php?categoria=Guillotinas">
                <img src="../Login/img/guillotina.jpeg" alt="TGuillotinas">
                    <div class="category-title">GUILLOTINAS</div>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Pie de Página -->
    <footer class="footer footer-terracota">
        &copy; 2024 TechCare | Todos los derechos reservados
    </footer>

</body>

</html>
