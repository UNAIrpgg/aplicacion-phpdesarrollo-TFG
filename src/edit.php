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
    <!-- Bootstrap CSS (con integridad SRI) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="mb-4 text-center">
        <h1 class="display-4">Plantilla Beneficiarios</h1>
    </header>
    
    <main>
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="add.html">Alta</a>
            </li>
        </ul>
        
        <h2 class="mb-4">Modificación de Beneficiarios</h2>
        
        <div class="form-container">
            <?php
            $beneficiary = $_GET['beneficiario_id'];
            $beneficiary = $mysqli->real_escape_string($beneficiary);
            $resultado = $mysqli->query("SELECT nombre, apellido, edad, fecha_ingreso, estado_recuperacion FROM beneficiarios WHERE beneficiario_id = $beneficiary");
            
            $fila = $resultado->fetch_array();
            $name = $fila['nombre'];
            $surname = $fila['apellido'];
            $age = $fila['edad'];
            $login_date = $fila['fecha_ingreso'];
            $recovery_status = $fila['estado_recuperacion'];
            $mysqli->close();
            ?>
            
            <form action="edit_action.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlspecialchars($name); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo htmlspecialchars($surname); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" name="edad" id="edad" value="<?php echo htmlspecialchars($age); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha Ingreso</label>
                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo htmlspecialchars($login_date); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="estado_recuperacion" class="form-label">Estado Recuperación</label>
                    <input type="text" class="form-control" name="estado_recuperacion" id="estado_recuperacion" value="<?php echo htmlspecialchars($recovery_status); ?>" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <input type="hidden" name="beneficiario_id" value="<?php echo $beneficiary; ?>">
                    <button type="submit" class="btn btn-primary" name="modifica">Guardar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
    
    <footer class="text-center text-muted mt-4">
        Created by the IES Miguel Herrero team &copy; 2025
    </footer>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


