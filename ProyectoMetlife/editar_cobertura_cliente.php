<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $relacion_id = $_GET['id'];
    $sql = "SELECT * FROM cobertura_cliente WHERE id = $relacion_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $relacion = $result->fetch_assoc();
    } else {
        echo "Relación cobertura_cliente no encontrada.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $relacion_id = $_POST['id'];
    $nuevaCobertura = $_POST['cobertura'];
    $nuevoCliente = $_POST['cliente'];

    editarCoberturaCliente($relacion_id, $nuevaCobertura, $nuevoCliente);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Relación Cobertura Cliente</title>>
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
    <h2>Editar Relación Cobertura Cliente</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $relacion['id']; ?>">
        <label for="cobertura">Cobertura:</label>
        <input type="text" name="cobertura" value="<?php echo $relacion['cobertura']; ?>"><br>
        <label for="cliente">Cliente:</label>
        <input type="text" name="cliente" value="<?php echo $relacion['cliente']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
    