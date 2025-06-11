<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">    
<title>Modificación de Beneficiarios</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
       :root {
           --verde-oscuro: #3F5B35;
           --fondo-claro: #F3F6F1;
           --azul-grisaceo: #556B7A;
           --verde-grisaceo: #557566;
       }
       body {
           background-color: var(--fondo-claro);
           font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
           color: var(--verde-oscuro);
       }
       .navbar-custom {
           background-color: var(--verde-oscuro);
       }
       .btn-primary {
           background-color: var(--verde-oscuro);
           border-color: var(--verde-oscuro);
       }
       .btn-primary:hover {
           background-color: var(--verde-grisaceo);
           border-color: var(--verde-grisaceo);
       }
       .card-custom {
           border-radius: 10px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
           border: none;
           background-color: white;
       }
       .header-custom {
           color: var(--verde-oscuro);
           font-weight: 600;
       }
       footer {
           background-color: var(--verde-oscuro);
           color: white;
       }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
<div class="container">
<a class="navbar-brand" href="index.php">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-pulse me-2" viewBox="0 0 16 16">
<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
<path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
</svg>
               Sistema de Beneficiarios
</a>
</div>
</nav>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card card-custom mb-4">
<div class="card-body text-center">
<h2 class="header-custom mb-4">
<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-pencil-square me-2" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
                           Resultado de Modificación
</h2>
<?php
                       if(isset($_POST['modifica'])) {
                           $beneficiary = $mysqli->real_escape_string($_POST['beneficiario_id']);
                           $name = $mysqli->real_escape_string($_POST['nombre']);
                           $surname = $mysqli->real_escape_string($_POST['apellido']);
                           $age = $mysqli->real_escape_string($_POST['edad']);
                           $login_date = $mysqli->real_escape_string($_POST['fecha_ingreso']);
                           $recovery_status = $mysqli->real_escape_string($_POST['estado_recuperacion']);
                           if(empty($name) || empty($surname) || empty($age) || empty($login_date) || empty($recovery_status)) {
                               echo '<div class="alert alert-danger">';
                               if(empty($name)) echo "<div>Campo nombre vacío.</div>";
                               if(empty($surname)) echo "<div>Campo apellido vacío.</div>";
                               if(empty($age)) echo "<div>Campo edad vacío.</div>";
                               if(empty($login_date)) echo "<div>Campo fecha ingreso vacío.</div>";
                               if(empty($recovery_status)) echo "<div>Campo estado recuperación vacío.</div>";
                               echo '</div>';
                               echo '<a href="javascript:self.history.back();" class="btn btn-secondary">Volver atrás</a>';
                           } else {
                               $mysqli->query("UPDATE beneficiarios SET
                                   nombre = '$name',
                                   apellido = '$surname',  
                                   edad = '$age',
                                   fecha_ingreso = '$login_date',  
                                   estado_recuperacion = '$recovery_status'
                                   WHERE beneficiario_id = $beneficiary");
                               $mysqli->close();
                               echo '<div class="alert alert-success mb-4">Registro actualizado correctamente.</div>';
                               echo '<a href="index.php" class="btn btn-primary">Volver al listado</a>';
                           }
                       }
                       ?>
</div>
</div>
</div>
</div>
</div>
<footer class="py-3 mt-4">
<div class="container text-center text-white" style="background-color: var(--verde-oscuro); border-radius: 8px; padding: 1rem;">
<small>Created by the IES Miguel Herrero team &copy; 2025</small>
</div>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


