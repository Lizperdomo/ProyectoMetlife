<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $perfil = $_POST['perfil'];

    $sql_insert_usuario = "INSERT INTO usuarios (username, password, status, perfil, created_at) 
                           VALUES ('$username', '$password', $status, $perfil, NOW())";

    if ($conn->query($sql_insert_usuario) === TRUE) {
        echo "Usuario agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'usuarios.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el usuario: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
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
        input[type="password"] {
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
    <h2>Agregar Usuario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="status">Status:</label>
        <input type="number" name="status" required><br>
        <label for="perfil">Perfil:</label>
        <input type="number" name="perfil" required><br>
        <input type="submit" value="Agregar Usuario">
    </form>
</body>
</html>
