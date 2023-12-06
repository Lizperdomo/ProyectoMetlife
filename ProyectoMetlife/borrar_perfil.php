<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perfil_id = $_POST['id'];

    $sql_delete_usuario_venta = "DELETE FROM usuario_venta WHERE usuario IN (SELECT id FROM usuarios WHERE perfil = $perfil_id)";
    $conn->query($sql_delete_usuario_venta);

    $sql_delete_perfil = "DELETE FROM perfiles WHERE id=$perfil_id";

    if ($conn->query($sql_delete_perfil) === TRUE) {
        echo "Perfil borrado con éxito.";
        header("Location: perfiles.php");
    } else {
        echo "Error al borrar el perfil: " . $conn->error;
    }
}

$conn->close();
?>
