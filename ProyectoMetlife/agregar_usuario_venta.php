<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $venta = $_POST['venta'];

    $sql_insert = "INSERT INTO usuario_venta (usuario, venta) 
                   VALUES ($usuario, $venta)";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Registro de Usuario Venta agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'usuario_venta.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el registro de Usuario Venta: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario Venta</title>
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
    <h2>Agregar Usuario Venta</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="usuario">Usuario ID:</label>
        <input type="text" name="usuario" required><br>
        <label for="venta">Venta ID:</label>
        <input type="text" name="venta" required><br>
        <input type="submit" value="Agregar Usuario Venta">
    </form>
</body>
</html>
