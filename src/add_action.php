<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta Pacientes</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
	<header class="mb-4">
		<h1 class="text-center">Plantilla Beneficiarios 2025</h1>
	</header>
	<main class="bg-white p-4 rounded shadow">

<?php
/* Se Comprueba si se ha llegado a esta página PHP a través del formulario de altas. 
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón Agregar.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['inserta'])) 
{
/* Se obtienen los datos del piloto y copiloto (nombre, apellido, nacionalidad) 
   a partir del formulario de alta, usando el método POST.
*/
	$name = $mysqli->real_escape_string($_POST['nombre']);
	$surname = $mysqli->real_escape_string($_POST['apellido']);
	$age = $mysqli->real_escape_string($_POST['edad']);
	$login_date = $mysqli->real_escape_string($_POST['fecha_ingreso']);
	$recovery_status = $mysqli->real_escape_string($_POST['estado_recuperacion']);

/* Con mysqli_real_escape_string protegemos caracteres especiales en una cadena 
   para evitar inyecciones SQL y errores en la consulta.
*/

// Se comprueba si existen campos del formulario vacíos
	if( empty($name) || empty($surname) || empty($age) || empty($login_date) || empty($recovery_status))
	{	
		echo '<div class="alert alert-danger">';
		if(empty($name)) {
			echo "<div>Campo Nombre vacío.</div>";
		}

		if(empty($surname)) {
			echo "<div>Campo Apellido vacío</div>";
		}

		if(empty($age)) {
			echo "<div>Campo Edad vacío.</div>";
		}

		if(empty($login_date)) {
			echo "<div>Campo Fecha Ingreso vacío.</div>";
		}

		if(empty($recovery_status)) {
			echo "<div>Campo Estado Recuperación vacío.</div>";
		}
		echo '</div>';
		// Enlace a la página anterior
		$mysqli->close();
		echo '<a href="javascript:self.history.back();" class="btn btn-secondary">Volver atrás</a>';
	} 
	else // Si no existen campos de formulario vacíos, se procede al alta del nuevo registro
	{
		// Se ejecuta una sentencia SQL para insertar un nuevo piloto/copiloto
		$result = $mysqli->query("INSERT INTO beneficiarios (nombre, apellido, edad, fecha_ingreso, estado_recuperacion) 
		VALUES ('$name', '$surname', '$age', '$login_date', '$recovery_status')");	

		// Se cierra la conexión
		$mysqli->close();
		echo '<div class="alert alert-success">Registro añadido correctamente...</div>';
		echo '<a href="index.php" class="btn btn-primary">Ver resultado</a>';
	}// fin sino
}
?>

	</main>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

