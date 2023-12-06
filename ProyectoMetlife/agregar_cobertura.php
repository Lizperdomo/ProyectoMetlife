<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $status = $_POST['status'];
    $costo = $_POST['costo'];

    $sql_insert = "INSERT INTO coberturas (nombre, descripcion, status, costo, created_at) 
                   VALUES ('$nombre', '$descripcion', $status, $costo, NOW())";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Cobertura agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'coberturas.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la cobertura: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cobertura</title>
    <style>
        body {
            font-family: "DejaVu Sans";
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
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 60%;
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
    <h2>Agregar Cobertura</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required><br>
        <label for="status">Status:</label>
        <input type="number" name="status" required><br>
        <label for="costo">Costo:</label>
        <input type="number" name="costo" step="0.01" required><br>
        <input type="submit" value="Agregar Cobertura">
    </form>
</body>
</html>
