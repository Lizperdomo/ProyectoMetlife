<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perfil = $_POST['perfil'];
    $status = isset($_POST['status']) ? 1 : 0;

    $sql_insert = "INSERT INTO perfiles (perfil, status, created_at) 
                   VALUES ('$perfil', $status, NOW())
                   ON DUPLICATE KEY UPDATE perfil=perfil";

    if ($conn->query($sql_insert) === TRUE) {
        header("Location: perfiles.php");
        exit;
    } else {
        echo "Error al agregar el perfil: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Perfil</title>
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
    <h2>Agregar Perfil</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="perfil">Perfil:</label>
        <input type="text" name="perfil" required><br>
        <label for="status">Status:</label>
        <input type="checkbox" name="status" value="1" checked><br>
        <input type="submit" value="Agregar Perfil">
    </form>
</body>
</html>
