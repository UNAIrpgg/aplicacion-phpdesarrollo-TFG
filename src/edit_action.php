<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>WRC 2025 - Modificación de Piloto y Copiloto</title>
</head>
<body>
<div>
	<header>
		<h1>Plantilla WRC 2025</h1>
	</header>
	<main>				

<?php
// Se comprueba si se ha enviado el formulario de modificación
if(isset($_POST['modifica'])) {

	// Se obtienen los datos del formulario mediante POST
	$idpiloto = $mysqli->real_escape_string($_POST['id']);
	$nombre_piloto = $mysqli->real_escape_string($_POST['nombre_piloto']);
	$apellido_piloto = $mysqli->real_escape_string($_POST['apellido_piloto']);
	$nacionalidad_piloto = $mysqli->real_escape_string($_POST['nacionalidad_piloto']);
	$nombre_copiloto = $mysqli->real_escape_string($_POST['nombre_copiloto']);
	$apellido_copiloto = $mysqli->real_escape_string($_POST['apellido_copiloto']);
	$nacionalidad_copiloto = $mysqli->real_escape_string($_POST['nacionalidad_copiloto']);

	// Se comprueba si hay algún campo vacío
	if(empty($nombre_piloto) || empty($apellido_piloto) || empty($nacionalidad_piloto) || empty($nombre_copiloto) || empty($apellido_copiloto) || empty($nacionalidad_copiloto)) {
		
		if(empty($nombre_piloto)) {
			echo "<font color='red'>Campo nombre piloto vacío.</font><br/>";
		}
		if(empty($apellido_piloto)) {
			echo "<font color='red'>Campo apellido piloto vacío.</font><br/>";
		}
		if(empty($nacionalidad_piloto)) {
			echo "<font color='red'>Campo nacionalidad piloto vacío.</font><br/>";
		}
		if(empty($nombre_copiloto)) {
			echo "<font color='red'>Campo nombre copiloto vacío.</font><br/>";
		}
		if(empty($apellido_copiloto)) {
			echo "<font color='red'>Campo apellido copiloto vacío.</font><br/>";
		}
		if(empty($nacionalidad_copiloto)) {
			echo "<font color='red'>Campo nacionalidad copiloto vacío.</font><br/>";
		}

	} else {
		// Se actualiza el registro en la base de datos
		$mysqli->query("UPDATE pilotos_copilotos SET 
			nombre_piloto = '$nombre_piloto', 
			apellido_piloto = '$apellido_piloto',  
			nacionalidad_piloto = '$nacionalidad_piloto',
			nombre_copiloto = '$nombre_copiloto',  
			apellido_copiloto = '$apellido_copiloto', 
			nacionalidad_copiloto = '$nacionalidad_copiloto' 
			WHERE id = $idpiloto");

		$mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}
}
?>

	</main>	
</div>
</body>
</html>


