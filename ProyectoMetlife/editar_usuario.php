<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usuario_id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $usuario_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $perfil = $_POST['perfil'];

    $sql_update = "UPDATE usuarios SET
                    username='$username', 
                    password='$password', 
                    status='$status', 
                    perfil='$perfil'
                    WHERE id=$usuario_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'usuarios.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
    <h2>Editar Usuario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $usuario['username']; ?>"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $usuario['password']; ?>"><br>
        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $usuario['status']; ?>"><br>
        <label for="perfil">Perfil:</label>
        <input type="text" name="perfil" value="<?php echo $usuario['perfil']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
