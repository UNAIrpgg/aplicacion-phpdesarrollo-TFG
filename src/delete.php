<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Piloto/Copiloto</title>
</head>
<body>
<div>
	<header>
		<h1>Plantilla WRC 2025</h1>
	</header>
	<main>

<?php
/* Obtiene el id del piloto/copiloto a eliminar desde la URL, utilizando el método GET */

$idpiloto = $_GET['id'];

// Protege caracteres especiales en la cadena SQL
$idpiloto = $mysqli->real_escape_string($idpiloto);

// Se ejecuta la eliminación del registro
$result = $mysqli->query("DELETE FROM pilotos_copilotos WHERE id = $idpiloto");

// Se cierra la conexión de la base de datos
$mysqli->close();

echo "<div>Registro del piloto/copiloto eliminado correctamente...</div>";
echo "<a href='index.php'>Ver resultado</a>";

// Se redirige a la página principal después de eliminar el registro
//header("Location:index.php");
?>
</main>
</div>
</body>
</html>


