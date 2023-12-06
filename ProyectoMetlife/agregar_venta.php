<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroTarjeta = $_POST['numero_tarjeta'];
    $cvv = $_POST['cvv'];
    $monto = $_POST['monto'];
    $usuario = $_POST['usuario'];

    $sql_insert_venta = "INSERT INTO ventas (numero_tarjeta, cvv, monto, usuario) 
                        VALUES ('$numeroTarjeta', '$cvv', '$monto', '$usuario')";

    if ($conn->query($sql_insert_venta) === TRUE) {
        echo "Venta agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'ventas.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la venta: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Venta</title>
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
    <h2>Agregar Venta</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="numero_tarjeta">Número de Tarjeta:</label>
        <input type="text" name="numero_tarjeta" required><br>
        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" required><br>
        <label for="monto">Monto:</label>
        <input type="text" name="monto" required><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>
        <input type="submit" value="Agregar Venta">
    </form>
</body>
</html>
