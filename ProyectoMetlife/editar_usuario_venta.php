<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usuario_venta_id = $_GET['id'];
    $sql = "SELECT * FROM usuario_venta WHERE id = $usuario_venta_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario_venta = $result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_venta_id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $venta = $_POST['venta'];

    $sql_update = "UPDATE usuario_venta SET
                    usuario='$usuario',
                    venta='$venta'
                    WHERE id=$usuario_venta_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'usuario_venta.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario Venta</title>
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
    <h2>Editar Usuario Venta</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $usuario_venta['id']; ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $usuario_venta['usuario']; ?>"><br>
        <label for="venta">Venta:</label>
        <input type="text" name="venta" value="<?php echo $usuario_venta['venta']; ?>"><br>
        <div class="form-group-buttons">
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
</body>
</html>
