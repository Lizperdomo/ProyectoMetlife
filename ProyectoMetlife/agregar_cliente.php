<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $idCobertura = $_POST['idCobertura'];

    // Insertar primero en la tabla usuarios para obtener un id autoincremental
    $sql_insert_usuario = "INSERT INTO usuarios (username, password, status, perfil, created_at) VALUES ('', '', 1, 1, NOW())";
    $conn->query($sql_insert_usuario);

    // Obtener el id generado automáticamente para usarlo en la inserción de userinfo
    $idUsuario = $conn->insert_id;

    // Luego insertar en userinfo con el id de usuario obtenido
    $sql_insert_userinfo = "INSERT INTO userinfo (id, nombre, lastname, birthday, genero, edad, celular, photo, bio, website, status, created_at) 
                            VALUES ($idUsuario, '', '', NULL, '', 0, '', '', '', '', 1, NOW())";
    $conn->query($sql_insert_userinfo);

    // Finalmente, insertar en clientes con el id de usuario obtenido
    $sql_insert_cliente = "INSERT INTO clientes (calle, colonia, municipio, estado, ciudad, CURP, RFC, idCobertura, id) 
                           VALUES ('$calle', '$colonia', '$municipio', '$estado', '$ciudad', '$curp', '$rfc', $idCobertura, $idUsuario)";

    if ($conn->query($sql_insert_cliente) === TRUE) {
        echo "Cliente agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'clientes.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el cliente: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
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
    <h2>Agregar Cliente</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="calle">Calle:</label>
        <input type="text" name="calle" required><br>
        <label for="colonia">Colonia:</label>
        <input type="text" name="colonia" required><br>
        <label for="municipio">Municipio:</label>
        <input type="text" name="municipio" required><br>
        <label for="estado">Estado:</label>
        <input type="text" name="estado" required><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" required><br>
        <label for="curp">CURP:</label>
        <input type="text" name="curp" required><br>
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" required><br>
        <label for="idCobertura">ID Cobertura:</label>
        <input type="text" name="idCobertura" required><br>
        <input type="submit" value="Agregar Cliente">
    </form>
</body>
</html>
