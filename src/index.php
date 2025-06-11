<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Beneficiarios</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
	<header class="py-4">
		<h1 class="text-center">Plantilla Beneficiarios</h1>
	</header>

	<main class="bg-white p-4 rounded shadow">
	<ul class="nav nav-pills mb-4">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Inicio</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="add.html">Alta</a>
		</li>
	</ul>
	<h2 class="mb-4">Todos los beneficiarios</h2>
	<div class="table-responsive">
	<table class="table table-striped table-hover">
	<thead class="table-dark">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Edad</th>
			<th>Fecha Ingreso</th>
			<th>Estado Recuperación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
// Se realiza una consulta para obtener todos los pilotos y copilotos ordenados alfabéticamente
$resultado = $mysqli->query("SELECT * FROM beneficiarios ORDER BY apellido, nombre");

// Cierra la conexión con la BD
$mysqli->close();

// Comprobamos si hay registros en la tabla
if ($resultado->num_rows > 0) {
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre']."</td>\n";
		echo "<td>".$fila['apellido']."</td>\n";
		echo "<td>".$fila['edad']."</td>\n";
		echo "<td>".$fila['fecha_ingreso']."</td>\n";
		echo "<td>".$fila['estado_recuperacion']."</td>\n";
		echo "<td>";
		// Enlaces para editar y eliminar el registro
		echo '<a href="edit.php?beneficiario_id='.$fila['beneficiario_id'].'" class="btn btn-sm btn-warning me-2">Editar</a>';
		echo '<a href="delete.php?beneficiario_id='.$fila['beneficiario_id'].'" class="btn btn-sm btn-danger" onClick="return confirm(\'¿Está seguro que desea eliminar este nombre?\')">Eliminar</a>';
		echo "</td>";
		echo "</tr>\n";
	}
}
?>
	</tbody>
	</table>
	</div>
	</main>
	<footer class="mt-4 text-center text-muted">
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>