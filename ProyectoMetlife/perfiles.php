<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "DejaVu Sans";
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .actions {
            white-space: nowrap;
            width: 1%;
        }

        .edit-btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            font-family: "DejaVu Sans";
            text-decoration: none;
            background-color: #3498db;
            color: #ffffff;
            border: 1px solid #3498db;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            
        }

        .delete-btn {
            background-color: #e74c3c;
            border: 1px solid #e74c3c;
            font-family: "DejaVu Sans";
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            text-decoration: none;
            color: #ffffff;
            border-radius: 4px;
            font-size: 15px;
        }

        .edit-btn:hover{
            background-color: #2980b9;
            border: 1px solid #2980b9;
            font-family: "DejaVu Sans";
        }
        
        .delete-btn:hover {
            background-color: #D32E0C;
            border: 1px solid #D32E0C;
            font-family: "DejaVu Sans";
        }

        h2 {
            text-align: center; /* Center the title */
        }

        .button-link {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        background-color: #3498db;
        color: white;
        border: 1px solid #3498db;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        transform: translate(445%, 0%);

    }

    .button-link:hover {
        background-color: #2980b9;
    }
    </style>
</head>
<body>

<?php
function editarPerfil($perfil_id) {
    echo "<a class='edit-btn' href='editar_perfil.php?id=$perfil_id'>Editar</a>";
}

function borrarPerfil($perfil_id) {
    echo "<form method='post' action='borrar_perfil.php' style='display:inline;'>
            <input type='hidden' name='id' value='$perfil_id'>
            <input class='delete-btn' type='submit' value='Borrar' onclick='return confirm(\"¿Estás seguro de borrar este perfil?\")'>
          </form>";
}

$sql = "SELECT * FROM perfiles";
$result = $conn->query($sql);

echo "<h2>Tabla Perfiles</h2>";
echo "<a href='agregar_perfil.php' class='button-link'>Agregar Nuevo Perfil</a><br><br>";
echo "<table>
<tr>
<th>ID</th>
<th>Perfil</th>
<th>Status</th>
<th>Acciones</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['perfil']}</td>
    <td>{$row['status']}</td>
    <td class='actions'>";
    editarPerfil($row['id']);
    echo " | ";
    borrarPerfil($row['id']);
    echo "</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>

</body>
</html>
