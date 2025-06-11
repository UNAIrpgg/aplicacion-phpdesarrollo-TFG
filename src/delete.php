<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Beneficiarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
	<header class="py-4">
		<h1 class="text-center">Plantilla Beneficiarios</h1>
	</header>
	<main class="bg-white p-4 rounded shadow">

<?php
/* Obtiene el id del piloto/copiloto a eliminar desde la URL, utilizando el método GET */

$beneficiary = $_GET['beneficiario_id'];

// Protege caracteres especiales en la cadena SQL
$beneficiary = $mysqli->real_escape_string($beneficiary);

// Se ejecuta la eliminación del registro
$result = $mysqli->query("DELETE FROM beneficiarios WHERE beneficiario_id = $beneficiary");

// Se cierra la conexión de la base de datos
$mysqli->close();

echo '<div class="alert alert-success">Registro del beneficiario eliminado correctamente...</div>';
echo '<a href="index.php" class="btn btn-primary">Ver resultado</a>';

// Se redirige a la página principal después de eliminar el registro
//header("Location:index.php");
?>
	</main>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


