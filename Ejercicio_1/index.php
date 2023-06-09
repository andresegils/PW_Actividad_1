<?php
include 'db.php';

if($_POST) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $matematicas = $_POST['matematicas'];
    $fisica = $_POST['fisica'];
    $programacion = $_POST['programacion'];

    $sql = "INSERT INTO estudiantes (id, nombre, matematicas, fisica, programacion)
    VALUES ('$id', '$nombre', '$matematicas', '$fisica', '$programacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <h2>Registro de Estudiantes</h2>
    <form method="post">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="matematicas">Nota de Matemáticas:</label>
            <input type="number" class="form-control" name="matematicas" id="matematicas" min="0" max="20">
        </div>
        <div class="form-group">
            <label for="fisica">Nota de Física:</label>
            <input type="number" class="form-control" name="fisica" id="fisica" min="0" max="20">
        </div>
        <div class="form-group">
            <label for="programacion">Nota de Programación:</label>
            <input type="number" class="form-control" name="programacion" id="programacion" min="0" max="20">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <br>
    <a href="estadisticas.php" class="btn btn-secondary">Ver tablas</a>
</div>


