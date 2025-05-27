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
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación de Piloto y Copiloto</h2>

<?php
// Obtiene el id del piloto a modificar desde la URL utilizando el método GET
$idpiloto = $_GET['id'];

// Protege caracteres especiales en la cadena para evitar inyección SQL
$idpiloto = $mysqli->real_escape_string($idpiloto);

// Se selecciona el registro del piloto y copiloto a modificar
$resultado = $mysqli->query("SELECT nombre_piloto, apellido_piloto, nacionalidad_piloto, nombre_copiloto, apellido_copiloto, nacionalidad_copiloto FROM pilotos_copilotos WHERE id = $idpiloto");

// Se extrae el registro y lo guarda en el array $fila
$fila = $resultado->fetch_array();
$nombre_piloto = $fila['nombre_piloto'];
$apellido_piloto = $fila['apellido_piloto'];
$nacionalidad_piloto = $fila['nacionalidad_piloto'];
$nombre_copiloto = $fila['nombre_copiloto'];
$apellido_copiloto = $fila['apellido_copiloto'];
$nacionalidad_copiloto = $fila['nacionalidad_copiloto'];

// Se cierra la conexión con la base de datos
$mysqli->close();
?>

<!-- FORMULARIO DE EDICIÓN. Al hacer clic en "Guardar", se envían los datos a edit_action.php -->
	<form action="edit_action.php" method="post">
		<div>
			<label for="nombre_piloto">Nombre Piloto</label>
			<input type="text" name="nombre_piloto" id="nombre_piloto" value="<?php echo $nombre_piloto;?>" required>
		</div>

		<div>
			<label for="apellido_piloto">Apellido Piloto</label>
			<input type="text" name="apellido_piloto" id="apellido_piloto" value="<?php echo $apellido_piloto;?>" required>
		</div>

		<div>
			<label for="nacionalidad_piloto">Nacionalidad Piloto</label>
			<input type="text" name="nacionalidad_piloto" id="nacionalidad_piloto" value="<?php echo $nacionalidad_piloto;?>" required>
		</div>

		<div>
			<label for="nombre_copiloto">Nombre Copiloto</label>
			<input type="text" name="nombre_copiloto" id="nombre_copiloto" value="<?php echo $nombre_copiloto;?>" required>
		</div>

		<div>
			<label for="apellido_copiloto">Apellido Copiloto</label>
			<input type="text" name="apellido_copiloto" id="apellido_copiloto" value="<?php echo $apellido_copiloto;?>" required>
		</div>

		<div>
			<label for="nacionalidad_copiloto">Nacionalidad Copiloto</label>
			<input type="text" name="nacionalidad_copiloto" id="nacionalidad_copiloto" value="<?php echo $nacionalidad_copiloto;?>" required>
		</div>

		<div>
			<input type="hidden" name="id" value=<?php echo $idpiloto;?>>
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>	
	<footer>
		Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>


