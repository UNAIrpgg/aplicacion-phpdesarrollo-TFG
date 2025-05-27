<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta Piloto/Copiloto</title>
</head>
<body>
<div>
	<header>
		<h1>Plantilla WRC 2025</h1>
	</header>
	<main>

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

	$pilot_name = $mysqli->real_escape_string($_POST['nombre_piloto']);
	$pilot_surname = $mysqli->real_escape_string($_POST['apellido_piloto']);
	$pilot_nationality = $mysqli->real_escape_string($_POST['nacionalidad_piloto']);
	$copilot_name = $mysqli->real_escape_string($_POST['nombre_copiloto']);
	$copilot_surname = $mysqli->real_escape_string($_POST['apellido_copiloto']);
	$copilot_nationality = $mysqli->real_escape_string($_POST['nacionalidad_copiloto']);

/* Con mysqli_real_escape_string protegemos caracteres especiales en una cadena 
   para evitar inyecciones SQL y errores en la consulta.
*/

// Se comprueba si existen campos del formulario vacíos
	if(empty($pilot_name) || empty($pilot_surname) || empty($pilot_nationality) || empty($copilot_name) || empty($copilot_surname) || empty($copilot_nationality)) 
	{
		if(empty($pilot_name)) {
			echo "<div>Campo Nombre Piloto vacío.</div>";
		}

		if(empty($pilot_surname)) {
			echo "<div>Campo Apellido Piloto vacío</div>";
		}

		if(empty($pilot_nationality)) {
			echo "<div>Campo Nacionalidad Piloto vacío.</div>";
		}

		if(empty($copilot_name)) {
			echo "<div>Campo Nombre Copiloto vacío.</div>";
		}

		if(empty($copilot_surname)) {
			echo "<div>Campo Apellido Copiloto vacío.</div>";
		}

		if(empty($copilot_nationality)) {
			echo "<div>Campo Nacionalidad Copiloto vacío.</div>";
		}
		
		// Enlace a la página anterior
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
	} 
	else // Si no existen campos de formulario vacíos, se procede al alta del nuevo registro
	{
		// Se ejecuta una sentencia SQL para insertar un nuevo piloto/copiloto
		$result = $mysqli->query("INSERT INTO pilotos_copilotos (nombre_piloto, apellido_piloto, nacionalidad_piloto, nombre_copiloto, apellido_copiloto, nacionalidad_copiloto) 
		VALUES ('$pilot_name', '$pilot_surname', '$pilot_nationality', '$copilot_name', '$copilot_surname', '$copilot_nationality')");	

		// Se cierra la conexión
		$mysqli->close();
		echo "<div>Registro añadido correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}// fin sino
}
?>

 	<!--<div>Registro añadido correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
	</main>
</div>
</body>
</html>

