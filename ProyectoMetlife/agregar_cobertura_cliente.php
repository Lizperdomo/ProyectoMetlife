<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCobertura = $_POST['idCobertura'];
    $idCliente = $_POST['idCliente'];

    $sql_insert = "INSERT INTO cobertura_cliente (cobertura, cliente) 
                   VALUES ('$idCobertura', '$idCliente')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Relación cobertura_cliente agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'cobertura_cliente.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la relación cobertura_cliente: " . $conn->error;
    }
}

// Obtener información necesaria para las listas desplegables 
$sql_coberturas = "SELECT * FROM coberturas";
$sql_clientes = "SELECT * FROM clientes";

$result_coberturas = $conn->query($sql_coberturas);
$result_clientes = $conn->query($sql_clientes);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Relación Cobertura Cliente</title>
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

        select,
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
    <h2>Agregar Relación Cobertura Cliente</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="idCobertura">Cobertura:</label>
        <select name="idCobertura" required>
            <?php while ($row = $result_coberturas->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php endwhile; ?>
        </select><br>
        <label for="idCliente">Cliente:</label>
        <select name="idCliente" required>
            <?php while ($row = $result_clientes->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Agregar Relación">
    </form>
</body>
</html>
