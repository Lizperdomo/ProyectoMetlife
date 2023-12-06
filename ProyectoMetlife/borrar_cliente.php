<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['id'];

    $sql_delete_cobertura_cliente = "DELETE FROM cobertura_cliente WHERE cliente=$cliente_id";
    $conn->query($sql_delete_cobertura_cliente);

    $sql_delete_cliente = "DELETE FROM clientes WHERE id=$cliente_id";

    if ($conn->query($sql_delete_cliente) === TRUE) {
        echo "Cliente borrado con éxito.";
        header("Location: clientes.php");
    } else {
        echo "Error al borrar el cliente: " . $conn->error;
    }
}
$conn->close();
?>
