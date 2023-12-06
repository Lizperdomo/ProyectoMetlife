<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $venta_id = $_GET['id'];
    $sql = "SELECT * FROM ventas WHERE id = $venta_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $venta = $result->fetch_assoc();
    } else {
        echo "Venta no encontrada.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $venta_id = $_POST['id'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $cvv = $_POST['cvv'];
    $monto = $_POST['monto'];
    $usuario = $_POST['usuario'];

    $sql_update = "UPDATE ventas SET
                    numero_tarjeta='$numero_tarjeta', 
                    cvv='$cvv', 
                    monto='$monto', 
                    usuario='$usuario' 
                    WHERE id=$venta_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'ventas.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar la venta: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
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
        input[type="number"],
        input[type="password"]  {
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
    <h2>Editar Venta</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $venta['id']; ?>">
        <label for="numero_tarjeta">Número Tarjeta:</label>
        <input type="text" name="numero_tarjeta" value="<?php echo $venta['numero_tarjeta']; ?>"><br>
        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" value="<?php echo $venta['cvv']; ?>"><br>
        <label for="monto">Monto:</label>
        <input type="text" name="monto" value="<?php echo $venta['monto']; ?>"><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $venta['usuario']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
