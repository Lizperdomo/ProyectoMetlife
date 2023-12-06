<?php
$servername = "localhost";
$username = "lizbeth";
$password = "Luna2003";
$dbname = "metlife";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
