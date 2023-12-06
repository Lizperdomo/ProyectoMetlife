<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cobertura_id = $_GET['id'];
    $sql = "SELECT * FROM coberturas WHERE id = $cobertura_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cobertura = $result->fetch_assoc();
    } else {
        echo "Cobertura no encontrada.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cobertura_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $status = $_POST['status'];
    $costo = $_POST['costo'];

    $sql_update = "UPDATE coberturas SET
                    nombre='$nombre',
                    descripcion='$descripcion',
                    status='$status',
                    costo='$costo'
                    WHERE id=$cobertura_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'coberturas.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar la cobertura: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cobertura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            text-align: center;
            padding: 0px;
        }

        h2 {
            color: #333;
            margin-top: 40px;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
            text-align: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 40%;
            padding: 10px 10px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 10px;
        }

        .form-group-buttons {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Editar Cobertura</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $cobertura['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cobertura['nombre']; ?>"><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo $cobertura['descripcion']; ?>"><br>
        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $cobertura['status']; ?>"><br>
        <label for="costo">Costo:</label>
        <input type="text" name="costo" value="<?php echo $cobertura['costo']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
