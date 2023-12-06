<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userinfo_id = $_GET['id'];
    $sql = "SELECT * FROM userinfo WHERE id = $userinfo_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $userinfo = $result->fetch_assoc();
    } else {
        echo "Perfil no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userinfo_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $celular = $_POST['celular'];
    $photo = $_POST['photo'];
    $bio = $_POST['bio'];
    $website = $_POST['website'];
    $status = $_POST['status'];

    $sql_update = "UPDATE userinfo SET
                    nombre='$nombre', 
                    lastname='$lastname', 
                    birthday='$birthday', 
                    genero='$genero', 
                    edad='$edad', 
                    celular='$celular', 
                    photo='$photo', 
                    bio='$bio', 
                    website='$website', 
                    status='$status' 
                    WHERE id=$userinfo_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'userinfo.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar informacion de Usuario</title>
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
    <h2>Editar Perfil</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $userinfo['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $userinfo['nombre']; ?>"><br>
        <label for="lastname">Apellido:</label>
        <input type="text" name="lastname" value="<?php echo $userinfo['lastname']; ?>"><br>
        <label for="birthday">Fecha de Nacimiento:</label>
        <input type="text" name="birthday" value="<?php echo $userinfo['birthday']; ?>"><br>
        <label for="genero">Género:</label>
        <input type="text" name="genero" value="<?php echo $userinfo['genero']; ?>"><br>
        <label for="edad">Edad:</label>
        <input type="text" name="edad" value="<?php echo $userinfo['edad']; ?>"><br>
        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $userinfo['celular']; ?>"><br>
        <label for="status">Estado:</label>
        <input type="text" name="status" value="<?php echo $userinfo['status']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
