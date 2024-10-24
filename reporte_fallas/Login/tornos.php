<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tabla de Tornos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); }
        h2 { font-weight: bold; color: #343a40; }
        table { margin-top: 20px; }
        thead { background-color: #007bff; color: white; }
        th, td { text-align: center; vertical-align: middle; }
        .table-responsive { margin-top: 20px; }
        .btn-add { margin-bottom: 20px; }
        td.observaciones { text-align: left; }
        .status-en-uso { background-color: #28a745; color: white; }
        .status-fuera-de-uso { background-color: #dc3545; color: white; }
        .status-en-reparacion { background-color: #ffc107; color: white; }
        #form-editar, #form-agregar { display: none; }
        .navbar { background-color: #dea632; }
        .navbar.is-light .navbar-item { color: #fff; }
        .navbar.is-light .navbar-item:hover { color: #b1291d; }
        .footer { background-color: #b1291d; color: #fff; padding: 5px 0; font-size: 0.9rem; margin-top: auto; }
        .box { text-align: left; }
        .navbar-brand img { max-height: 50px; margin-right: auto; }
    </style>
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#"><img src="https://www.itca.edu.sv/wp-content/uploads/2017/01/logo-new-slider-1.png" alt="Logo"></a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Lista de Tornos</h2>
        <div class="text-right">
            <button class="btn btn-primary btn-add" onclick="mostrarFormularioAgregar()">
                <i class="fas fa-plus-circle"></i> Agregar nuevo torno
            </button>
        </div>
        <div id="form-agregar">
            <h4 class="text-center">Agregar Nuevo Torno</h4>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombreNuevo" name="nombreNuevo" required></div>
                    <div class="form-group col-md-6"><label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marcaNuevo" name="marcaNuevo" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="modelo">Modelo</label>
                        <input type="text" class="form-control" id="modeloNuevo" name="modeloNuevo"></div>
                    <div class="form-group col-md-6"><label for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigoNuevo" name="codigoNuevo" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="fecha_ingreso">Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="fechaIngresoNuevo" name="fechaIngresoNuevo" required></div>
                    <div class="form-group col-md-6"><label for="estado">Estado</label>
                        <select class="form-control" id="estadoNuevo" name="estadoNuevo" required>
                            <option value="En uso">En uso</option>
                            <option value="Fuera de uso">Fuera de uso</option>
                            <option value="En Reparacion">En Reparación</option></select>
                    </div>
                </div>
                <div class="form-group"><label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observacionesNuevo" name="observacionesNuevo"></textarea>
                </div>
                <div class="form-group"><label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagenNuevo" name="imagenNuevo" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success" name="agregar_torno">Agregar Torno</button>
                <button type="button" class="btn btn-secondary" onclick="ocultarFormularioAgregar()">Cancelar</button>
            </form>
        </div>
        <div id="form-editar">
            <h4 class="text-center">Editar Torno</h4>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" id="idEditar">
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required></div>
                    <div class="form-group col-md-6"><label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="modelo">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo"></div>
                    <div class="form-group col-md-6"><label for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" required></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6"><label for="fecha_ingreso">Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required></div>
                    <div class="form-group col-md-6"><label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="En uso">En uso</option>
                            <option value="Fuera de uso">Fuera de uso</option>
                            <option value="En Reparacion">En Reparación</option></select>
                    </div>
                </div>
                <div class="form-group"><label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                </div>
                <div class="form-group"><label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagenEditar" name="imagenEditar" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary" name="actualizar_torno">Actualizar Torno</button>
                <button type="button" class="btn btn-secondary" onclick="ocultarFormulario()">Cancelar</button>
            </form>
        </div>
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Código</th>
                        <th>Fecha de Ingreso</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "reporte_fallas");
                    if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

                    if (isset($_POST['id_eliminar'])) {
                        $idEliminar = $_POST['id_eliminar'];
                        $sqlEliminar = "DELETE FROM tornos WHERE id = ?";
                        $stmtEliminar = $conn->prepare($sqlEliminar);
                        $stmtEliminar->bind_param("i", $idEliminar);
                        if ($stmtEliminar->execute()) echo "<div class='alert alert-success'>Torno eliminado correctamente</div>";
                        else echo "<div class='alert alert-danger'>Error al eliminar el torno: "
                        . $conn->error . "</div>";
                        $stmtEliminar->close();
                    }

                    if (isset($_POST['agregar_torno'])) {
                        $nombreNuevo = $_POST['nombreNuevo'];
                        $marcaNuevo = $_POST['marcaNuevo'];
                        $modeloNuevo = $_POST['modeloNuevo'];
                        $codigoNuevo = $_POST['codigoNuevo'];
                        $fechaIngresoNuevo = $_POST['fechaIngresoNuevo'];
                        $estadoNuevo = $_POST['estadoNuevo'];
                        $observacionesNuevo = $_POST['observacionesNuevo'];

                        $rutaImagen = "";
                        if (isset($_FILES['imagenNuevo']) && $_FILES['imagenNuevo']['error'] === UPLOAD_ERR_OK) {
                            $nombreImagen = $_FILES['imagenNuevo']['name'];
                            $rutaImagen = 'uploads/' . basename($nombreImagen);
                            $uploadOk = move_uploaded_file($_FILES['imagenNuevo']['tmp_name'], $rutaImagen);
                            if (!$uploadOk) {
                                echo "<div class='alert alert-danger'>Error al subir la imagen</div>";
                                $rutaImagen = "";
                            }
                        }

                        $sqlAgregar = "INSERT INTO tornos (nombre, marca, modelo, codigo, fecha_ingreso, estado, observaciones, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmtAgregar = $conn->prepare($sqlAgregar);
                        $stmtAgregar->bind_param("ssssssss", $nombreNuevo, $marcaNuevo, $modeloNuevo, $codigoNuevo, $fechaIngresoNuevo, $estadoNuevo, $observacionesNuevo, $rutaImagen);

                        if ($stmtAgregar->execute()) {
                            echo "<div class='alert alert-success'>Nuevo torno agregado correctamente</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error al agregar el torno: " . $conn->error . "</div>";
                        }
                        $stmtAgregar->close();
                    }

                    if (isset($_POST['actualizar_torno'])) {
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $codigo = $_POST['codigo'];
                        $fechaIngreso = $_POST['fecha_ingreso'];
                        $estado = $_POST['estado'];
                        $observaciones = $_POST['observaciones'];

                        $rutaImagenEditar = "";
                        if (isset($_FILES['imagenEditar']) && $_FILES['imagenEditar']['error'] === UPLOAD_ERR_OK) {
                            $nombreImagenEditar = $_FILES['imagenEditar']['name'];
                            $rutaImagenEditar = 'uploads/' . basename($nombreImagenEditar);
                            $uploadOkEditar = move_uploaded_file($_FILES['imagenEditar']['tmp_name'], $rutaImagenEditar);
                            if (!$uploadOkEditar) {
                                echo "<div class='alert alert-danger'>Error al subir la imagen</div>";
                                $rutaImagenEditar = "";
                            }
                        }

                        $sqlActualizar = "UPDATE tornos SET nombre=?, marca=?, modelo=?, codigo=?, fecha_ingreso=?, estado=?, observaciones=?, imagen_url=? WHERE id=?";
                        $stmtActualizar = $conn->prepare($sqlActualizar);
                        $stmtActualizar->bind_param("ssssssssi", $nombre, $marca, $modelo, $codigo, $fechaIngreso, $estado, $observaciones, $rutaImagenEditar, $id);

                        if ($stmtActualizar->execute()) {
                            echo "<div class='alert alert-success'>Torno actualizado correctamente</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error al actualizar el torno: " . $conn->error . "</div>";
                        }
                        $stmtActualizar->close();
                    }

                    $sql = "SELECT * FROM tornos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["marca"] . "</td>";
                            echo "<td>" . $row["modelo"] . "</td>";
                            echo "<td>" . $row["codigo"] . "</td>";
                            echo "<td>" . $row["fecha_ingreso"] . "</td>";
                            echo "<td>" . $row["estado"] . "</td>";
                            echo "<td>" . $row["observaciones"] . "</td>";
                            echo "<td><img src='" . $row["imagen_url"] . "' width='100' alt='Imagen de torno'></td>";
                            echo "<td>";
                            echo "<button class='btn btn-warning btn-sm' onclick='mostrarFormularioEditar(\"" . $row["id"] . "\", \"" . $row["nombre"] . "\", \"" . $row["marca"] . "\", \"" . $row["modelo"] . "\", \"" . $row["codigo"] . "\", \"" . $row["fecha_ingreso"] . "\", \"" . $row["estado"] . "\", \"" . $row["observaciones"] . "\")'><i class='fas fa-edit'></i> Editar</button> ";
                            echo "<form method='POST' action='' class='d-inline' onsubmit='return confirm(\"¿Estás seguro que deseas eliminar este torno?\");'>";
                            echo "<input type='hidden' name='id_eliminar' value='" . $row["id"] . "'>";
                            echo "<button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'>No hay datos disponibles</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="inventario.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Regresar a Inventario
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function mostrarFormularioAgregar() {
            document.getElementById("form-agregar").style.display = "block";
            ocultarFormularioEditar();
        }

        function ocultarFormularioAgregar() {
            document.getElementById("form-agregar").style.display = "none";
        }

        function mostrarFormularioEditar(id, nombre, marca, modelo, codigo, fecha_ingreso, estado, observaciones) {
            document.getElementById("idEditar").value = id;
            document.getElementById("nombre").value = nombre;
            document.getElementById("marca").value = marca;
            document.getElementById("modelo").value = modelo;
            document.getElementById("codigo").value = codigo;
            document.getElementById("fecha_ingreso").value = fecha_ingreso;
            document.getElementById("estado").value = estado;
            document.getElementById("observaciones").value = observaciones;
            document.getElementById("form-editar").style.display = "block";
            ocultarFormularioAgregar();
            window.scrollTo(0, 0);
        }

        function ocultarFormularioEditar() {
            document.getElementById("form-editar").style.display = "none";
        }
    </script>
</body>
</html>
