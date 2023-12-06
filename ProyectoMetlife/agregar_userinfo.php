<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el último ID de usuario insertado en la tabla usuarios
    $sql_get_last_user_id = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql_get_last_user_id);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['id'] + 1; // Incrementar el último ID para el nuevo usuario
    } else {
        // Si no hay usuarios, comenzar desde 1
        $idUsuario = 1;
    }

    // Generar un nombre de usuario único basado en el ID del usuario
    $username = "user" . $idUsuario;

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $celular = $_POST['celular'];
    $status = isset($_POST['status']) ? 1 : 0; // Si el checkbox está marcado, establecer status a 1, de lo contrario, a 0.

    // Insertar en la tabla usuarios
    $sql_insert_usuario = "INSERT INTO usuarios (username, password, status, perfil, created_at) VALUES ('$username', '', $status, 1, NOW())";
    $conn->query($sql_insert_usuario);

    // Obtener el ID generado automáticamente para usarlo en la inserción de userinfo
    $idUsuario = $conn->insert_id;

    // Insertar en la tabla userinfo
    $sql_insert_userinfo = "INSERT INTO userinfo (id, nombre, lastname, birthday, genero, edad, celular, status, created_at) 
                            VALUES ($idUsuario, '$nombre', '$lastname', '$birthday', '$genero', $edad, '$celular', $status, NOW())";

    if ($conn->query($sql_insert_userinfo) === TRUE) {
        echo "Registro agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'userinfo.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar UserInfo</title>
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
        input[type="number"],
        input[type="date"] {
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
    <h2>Agregar UserInfo</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" required><br>
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday"><br>
        <label for="genero">Género:</label>
        <input type="text" name="genero"><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" required><br>
        <label for="celular">Celular:</label>
        <input type="text" name="celular"><br>
        <label for="status">Status:</label>
        <input type="checkbox" name="status" checked><br> 
        <input type="submit" value="Agregar Registro">
    </form>
</body>
</html>
