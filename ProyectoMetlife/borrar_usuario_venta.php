<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_venta_id = $_POST['id'];

    $sql_delete = "DELETE FROM usuario_venta WHERE id=$usuario_venta_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Registro borrado con éxito.";
        header("Location: usuario_venta.php");
    } else {
        echo "Error al borrar el registro: " . $conn->error;
    }
}

$conn->close();
?>
