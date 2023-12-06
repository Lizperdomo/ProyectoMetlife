<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['id'];

    $sql_delete_ventas = "DELETE FROM ventas WHERE usuario=$usuario_id";
    if ($conn->query($sql_delete_ventas) === TRUE) {
        $sql_delete_usuario = "DELETE FROM usuarios WHERE id=$usuario_id";

        if ($conn->query($sql_delete_usuario) === TRUE) {
            echo "Usuario borrado con éxito.";
            header("Location: usuarios.php");
        } else {
            echo "Error al borrar el usuario: " . $conn->error;
        }
    } else {
        echo "Error al borrar los registros en 'ventas': " . $conn->error;
    }
}

$conn->close();
?>
