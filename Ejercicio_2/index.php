<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Formulario de Empleado</h2>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <?php
    for ($i = 0; $i < 5; $i++) {
        echo '<div class="card mb-3">';
        echo '<div class="card-header">Empleado '.($i + 1).'</div>';
        echo '<div class="card-body">';
        echo '<div class="form-group">';
        echo '<label for="nombre_apellido_'.$i.'">Nombre y Apellido:</label>';
        echo '<input type="text" class="form-control" id="nombre_apellido_'.$i.'" name="nombre_apellido[]">';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="edad_'.$i.'">Edad:</label>';
        echo '<input type="text" class="form-control" id="edad_'.$i.'" name="edad[]">';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="estado_civil_'.$i.'">Estado Civil:</label>';
        echo '<select class="form-control" id="estado_civil_'.$i.'" name="estado_civil[]">';
        echo '<option value="soltero">Soltero(a)</option>';
        echo '<option value="casado">Casado(a)</option>';
        echo '<option value="viudo">Viudo(a)</option>';
        echo '</select>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="sexo_'.$i.'">Sexo:</label>';
        echo '<select class="form-control" id="sexo_'.$i.'" name="sexo[]">';
        echo '<option value="femenino">Femenino</option>';
        echo '<option value="masculino">Masculino</option>';
        echo '</select>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="sueldo_'.$i.'">Sueldo:</label>';
        echo '<select class="form-control" id="sueldo_'.$i.'" name="sueldo[]">';
        echo '<option value="1000">Menos de 1000 Bs.</option>';
        echo '<option value="2500">Entre 1000 y 2500 Bs.</option>';
        echo '<option value="2500+">Más de 2500 Bs.</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $empleadas = 0;
      $hombresCasados = 0;
      $mujeresViudas = 0;
      $edadHombres = 0;
      $contHombres = 0;

      for ($i = 0; $i < 5; $i++) {
          if ($_POST['sexo'][$i] == 'femenino') {
              $empleadas++;
              if ($_POST['estado_civil'][$i] == 'viudo' && $_POST['sueldo'][$i] != '1000') {
                  $mujeresViudas++;
              }
          } elseif ($_POST['sexo'][$i] == 'masculino') {
              $contHombres++;
              $edadHombres += $_POST['edad'][$i];
              if ($_POST['estado_civil'][$i] == 'casado' && $_POST['sueldo'][$i] == '2500+') {
                  $hombresCasados++;
              }
          }
      }
      $edadPromedioHombres = $edadHombres / $contHombres;

      echo '<div class="mt-5">';
      echo 'Total de empleados del sexo femenino: ' . $empleadas . '<br>';
      echo 'Total de hombres casados que ganan más de 2500 Bs.: ' . $hombresCasados . '<br>';
      echo 'Total de mujeres viudas que ganan más de 1000 Bs.: ' . $mujeresViudas . '<br>';
      echo 'Edad promedio de los hombres: ' . $edadPromedioHombres;
      echo '</div>';
  }
  ?>
</div>

</body>
</html>
