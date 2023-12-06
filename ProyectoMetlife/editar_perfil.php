<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $perfil_id = $_GET['id'];
    $sql = "SELECT * FROM perfiles WHERE id = $perfil_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $perfil = $result->fetch_assoc();
    } else {
        echo "Perfil no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perfil_id = $_POST['id'];
    $perfil_nombre = $_POST['perfil'];
    $perfil_status = $_POST['status'];

    $sql_update = "UPDATE perfiles SET perfil='$perfil_nombre', status='$perfil_status' WHERE id=$perfil_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Cambios guardados exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'perfiles.php';
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
    <title>Editar Perfil</title>
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
        <input type="hidden" name="id" value="<?php echo $perfil['id']; ?>">
        <label for="perfil">Perfil:</label>
        <input type="text" name="perfil" value="<?php echo $perfil['perfil']; ?>"><br>
        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $perfil['status']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
