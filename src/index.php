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
	<title>Pilotos y Copilotos WRC</title>
</head>
<body>
<div>
	<header>
		<h1>Plantilla WRC 2025</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Alta</a></li>
	</ul>
	<h2>Pilotos y Copilotos</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Nombre Piloto</th>
			<th>Apellido Piloto</th>
			<th>Nacionalidad Piloto</th>
			<th>Nombre Copiloto</th>
			<th>Apellido Copiloto</th>
			<th>Nacionalidad Copiloto</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
// Se realiza una consulta para obtener todos los pilotos y copilotos ordenados alfabéticamente
$resultado = $mysqli->query("SELECT * FROM pilotos_copilotos ORDER BY apellido_piloto, nombre_piloto");

// Cierra la conexión con la BD
$mysqli->close();

// Comprobamos si hay registros en la tabla
if ($resultado->num_rows > 0) {
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre_piloto']."</td>\n";
		echo "<td>".$fila['apellido_piloto']."</td>\n";
		echo "<td>".$fila['nacionalidad_piloto']."</td>\n";
		echo "<td>".$fila['nombre_copiloto']."</td>\n";
		echo "<td>".$fila['apellido_copiloto']."</td>\n";
		echo "<td>".$fila['nacionalidad_copiloto']."</td>\n";
		echo "<td>";
		// Enlaces para editar y eliminar el registro
		echo "<a href=\"edit.php?id=$fila[id]\">Edición</a>\n";
		echo "<a href=\"delete.php?id=$fila[id]\" onClick=\"return confirm('¿Está seguro que desea eliminar este piloto y copiloto?')\" >Baja</a></td>\n";
		echo "</td>";
		echo "</tr>\n";
	}
}
?>
	</tbody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>
