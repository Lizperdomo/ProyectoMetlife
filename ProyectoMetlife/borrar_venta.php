<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $venta_id = $_POST['id'];

    $sql_delete_usuario_venta = "DELETE FROM usuario_venta WHERE venta=$venta_id";

    if ($conn->query($sql_delete_usuario_venta) === TRUE) {
        $sql_delete_venta = "DELETE FROM ventas WHERE id=$venta_id";

        if ($conn->query($sql_delete_venta) === TRUE) {
            echo "Venta borrada con éxito.";
            header("Location: ventas.php");
        } else {
            echo "Error al borrar la venta: " . $conn->error;
        }
    } else {
        echo "Error al borrar los registros de usuario_venta: " . $conn->error;
    }
}
$conn->close();
?>
