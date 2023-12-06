<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cobertura_id = $_POST['id'];

    $sql_check_relaciones = "SELECT COUNT(*) as count FROM clientes WHERE idCobertura = $cobertura_id";
    $result = $conn->query($sql_check_relaciones);
    $row = $result->fetch_assoc();
    $num_relaciones = $row['count'];

    if ($num_relaciones > 0) {
        echo "Error: Hay clientes asociados a esta cobertura. Debes eliminar o actualizar esos registros antes de borrar la cobertura.";
    } else {
        $sql_delete = "DELETE FROM coberturas WHERE id=$cobertura_id";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Cobertura borrada con éxito.";
            header("Location: coberturas.php");
        } else {
            echo "Error al borrar la cobertura: " . $conn->error;
        }
    }
}

$conn->close();
?>
