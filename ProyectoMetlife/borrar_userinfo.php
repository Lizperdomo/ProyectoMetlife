<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userinfo_id = $_POST['id'];

    $sql_delete_dependent = "DELETE FROM clientes WHERE id = $userinfo_id";

    if ($conn->query($sql_delete_dependent) === TRUE) {
        $sql_delete_profile = "DELETE FROM userinfo WHERE id=$userinfo_id";

        if ($conn->query($sql_delete_profile) === TRUE) {
            echo "Perfil borrado con éxito.";
            header("Location: userinfo.php");
        } else {
            echo "Error al borrar el perfil: " . $conn->error;
        }
    } else {
        echo "Error al borrar registros dependientes: " . $conn->error;
    }
}

$conn->close();
?>
