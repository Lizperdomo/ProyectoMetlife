<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cliente_id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = $cliente_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['id'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $idCobertura = $_POST['idCobertura'];

    $sql_update = "UPDATE clientes SET
                    calle='$calle', 
                    colonia='$colonia', 
                    municipio='$municipio', 
                    estado='$estado', 
                    ciudad='$ciudad', 
                    CURP='$curp', 
                    RFC='$rfc', 
                    idCobertura=$idCobertura 
                    WHERE id=$cliente_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'clientes.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar el cliente: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
    <h2>Editar Cliente</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        <label for="calle">Calle:</label>
        <input type="text" name="calle" value="<?php echo $cliente['calle']; ?>"><br>
        <label for="colonia">Colonia:</label>
        <input type="text" name="colonia" value="<?php echo $cliente['colonia']; ?>"><br>
        <label for="municipio">Municipio:</label>
        <input type="text" name="municipio" value="<?php echo $cliente['municipio']; ?>"><br>
        <label for="estado">Estado:</label>
        <input type="text" name="estado" value="<?php echo $cliente['estado']; ?>"><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo $cliente['ciudad']; ?>"><br>
        <label for="curp">CURP:</label>
        <input type="text" name="curp" value="<?php echo $cliente['CURP']; ?>"><br>
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" value="<?php echo $cliente['RFC']; ?>"><br>
        <label for="idCobertura">ID Cobertura:</label>
        <input type="text" name="idCobertura" value="<?php echo $cliente['idCobertura']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
