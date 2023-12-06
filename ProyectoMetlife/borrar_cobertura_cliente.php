<?php
include 'conexion.php';

if (!function_exists('borrarCoberturaCliente')) {
    function borrarCoberturaCliente($id) {
        global $conn;

        $sql_delete = "DELETE FROM cobertura_cliente WHERE id=$id";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Relación cobertura_cliente borrada con éxito.";
            header("Location: cobertura_cliente.php");
        } else {
            echo "Error al borrar la relación cobertura_cliente: " . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $relacion_id = $_POST['id'];

    borrarCoberturaCliente($relacion_id);
}

$conn->close();
?>
