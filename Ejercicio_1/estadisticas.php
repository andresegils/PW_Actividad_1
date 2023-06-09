<!DOCTYPE html>
<html>
<head>
    <title>Estudiantes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        include 'db.php';

        // Consulta para obtener los datos de los estudiantes
        $result = $conn->query("SELECT * FROM estudiantes");

        // Consultas para obtener las estadísticas
        $promedio_math = $conn->query("SELECT AVG(matematicas) AS promedio_matematicas FROM estudiantes")->fetch_assoc();
        $promedio_physics = $conn->query("SELECT AVG(fisica) AS promedio_fisica FROM estudiantes")->fetch_assoc();
        $promedio_programming = $conn->query("SELECT AVG(programacion) AS promedio_programacion FROM estudiantes")->fetch_assoc();

        // Nota máxima en cada materia
        $max_math = $conn->query("SELECT MAX(matematicas) AS max_matematicas FROM estudiantes")->fetch_assoc();
        $max_physics = $conn->query("SELECT MAX(fisica) AS max_fisica FROM estudiantes")->fetch_assoc();
        $max_programming = $conn->query("SELECT MAX(programacion) AS max_programacion FROM estudiantes")->fetch_assoc();

        // Otras estadísticas 
        $aprov_math = $conn->query("SELECT COUNT(*) AS aprov_math FROM estudiantes WHERE matematicas >= 10")->fetch_assoc();
        $aprov_physics = $conn->query("SELECT COUNT(*) AS aprov_physics FROM estudiantes WHERE fisica >= 10")->fetch_assoc();
        $aprov_programming = $conn->query("SELECT COUNT(*) AS aprov_programming FROM estudiantes WHERE programacion >= 10")->fetch_assoc();

        $reprob_math = $conn->query("SELECT COUNT(*) AS reprob_math FROM estudiantes WHERE matematicas <= 10")->fetch_assoc();
        $reprob_physics = $conn->query("SELECT COUNT(*) AS reprob_physics FROM estudiantes WHERE fisica <= 10")->fetch_assoc();
        $reprob_programming = $conn->query("SELECT COUNT(*) AS reprob_programming FROM estudiantes WHERE programacion <= 10")->fetch_assoc();

        // Los que aprobaron todas las materias
        $aprov_all = $conn->query("SELECT COUNT(*) AS aprov_all FROM estudiantes WHERE matematicas >= 10 AND fisica >= 10 AND programacion >= 10")->fetch_assoc();
        
        // Los que aprobaron solo dos materias
        $aprov_two = $conn->query("SELECT COUNT(*) AS aprov_two FROM estudiantes WHERE (matematicas >= 10 AND fisica >= 10 AND programacion < 10) OR (fisica >= 10 AND matematicas >= 10 AND programacion < 10) OR (programacion >= 10 AND matematicas >= 10 AND fisica < 10) OR (matematicas >= 10 AND fisica < 10 AND programacion >= 10) OR (fisica >= 10 AND matematicas < 10 AND programacion >= 10) OR (programacion >= 10 AND matematicas < 10 AND fisica >= 10)")->fetch_assoc();

        // Los que aprobaron solo una materia
        $aprov_one = $conn->query("SELECT COUNT(*) AS aprov_one FROM estudiantes WHERE (matematicas >= 10 AND fisica < 10 AND programacion < 10) OR (fisica >= 10 AND matematicas < 10 AND programacion < 10) OR (programacion >= 10 AND matematicas < 10 AND fisica < 10)")->fetch_assoc();
        ?>

        <h1>Estudiantes</h1>
        
        <h2>Datos de los estudiantes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Matemáticas</th>
                    <th>Física</th>
                    <th>Programación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['matematicas']; ?></td>
                        <td><?php echo $row['fisica']; ?></td>
                        <td><?php echo $row['programacion']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Estadísticas</h2>

        <div class="row">
            <div class="col-md-6">
                <h3>Promedio de notas</h3>
                <p>Promedio de notas de Matemáticas: <?php echo $promedio_math['promedio_matematicas']; ?></p>
                <p>Promedio de notas de Física: <?php echo $promedio_physics['promedio_fisica']; ?></p>
                <p>Promedio de notas de Programación: <?php echo $promedio_programming['promedio_programacion']; ?></p>
            </div>

            <div class="col-md-6">
                <h3>Aprobados</h3>
                <p>Cantidad de alumnos que pasaron Matemáticas: <?php echo $aprov_math['aprov_math']; ?></p>
                <p>Cantidad de alumnos que pasaron Física: <?php echo $aprov_physics['aprov_physics']; ?></p>
                <p>Cantidad de alumnos que pasaron Programación: <?php echo $aprov_programming['aprov_programming']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Reprobados</h3>
                <p>Cantidad de alumnos que reprobaron Matemáticas: <?php echo $reprob_math['reprob_math']; ?></p>
                <p>Cantidad de alumnos que reprobaron Física: <?php echo $reprob_physics['reprob_physics']; ?></p>
                <p>Cantidad de alumnos que reprobaron Programación: <?php echo $reprob_programming['reprob_programming']; ?></p>
            </div>

            <div class="col-md-6">
                <h3>Otros datos</h3>
                <p>Máximo de nota en Matemáticas: <?php echo $max_math['max_matematicas']; ?></p>
                <p>Máximo de nota en Física: <?php echo $max_physics['max_fisica']; ?></p>
                <p>Máximo de nota en Programación: <?php echo $max_programming['max_programacion']; ?></p>
                <p>Cantidad de alumnos que aprobaron todas las materias: <?php echo $aprov_all['aprov_all']; ?></p>
                <p>Cantidad de alumnos que aprobaron dos materias: <?php echo $aprov_two['aprov_two']; ?></p>
                <p>Cantidad de alumnos que aprobaron una materia: <?php echo $aprov_one['aprov_one']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
