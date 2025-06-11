<?php
//Incluye fichero con parámetros de conexión a la base de datos
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
</head>
<body class="bg-light">
<div class="container">
	<header class="py-4">
		<h1 class="text-center">Plantilla Beneficiarios </h1>
	</header>
	<main class="bg-white p-4 rounded shadow">				

<?php
// Se comprueba si se ha enviado el formulario de modificación
if(isset($_POST['modifica'])) {

	// Se obtienen los datos del formulario mediante POST
	$beneficiary = $mysqli->real_escape_string($_POST['beneficiario_id']);
	$name = $mysqli->real_escape_string($_POST['nombre']);
	$surname = $mysqli->real_escape_string($_POST['apellido']);
	$age = $mysqli->real_escape_string($_POST['edad']);
	$login_date = $mysqli->real_escape_string($_POST['fecha_ingreso']);
	$recovery_status = $mysqli->real_escape_string($_POST['estado_recuperacion']);

	// Se comprueba si hay algún campo vacío
	if(empty($name) || empty($surname) || empty($age) || empty($login_date) || empty($recovery_status))  {
		
		echo '<div class="alert alert-danger">';
		if(empty($name)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}
		if(empty($surname)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}
		if(empty($age)) {
			echo "<font color='red'>Campo edad vacío.</font><br/>";
		}
		if(empty($login_date)) {
			echo "<font color='red'>Campo fecha ingreso vacío.</font><br/>";
		}
		if(empty($recovery_status)) {
			echo "<font color='red'>Campo estado recuperación vacío.</font><br/>";
		}
		echo '</div>';

	} else {
		// Se actualiza el registro en la base de datos
		$mysqli->query("UPDATE beneficiarios SET 
			nombre = '$name', 
			apellido = '$surname',  
			edad = '$age',
			fecha_ingreso = '$login_date',  
			estado_recuperacion = '$recovery_status' 

			WHERE beneficiario_id = $beneficiary");

		$mysqli->close();
        echo '<div class="alert alert-success">Registro editado correctamente...</div>';
		echo '<a href="index.php" class="btn btn-primary">Ver resultado</a>';
	}
}
?>

	</main>	
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


