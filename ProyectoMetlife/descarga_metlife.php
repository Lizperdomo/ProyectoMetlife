<?php
$servername = "localhost";
$username = "lizbeth";
$password = "Luna2003";
$dbname = "metlife";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$backupFileName = 'metlife.sql';

$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $backupFile = fopen($backupFileName, 'w');

    while ($row = $result->fetch_assoc()) {
        $tableName = $row['Tables_in_metlife'];
        $tableDump = "SHOW CREATE TABLE $tableName";
        $tableResult = $conn->query($tableDump);
        $tableRow = $tableResult->fetch_assoc();
        fwrite($backupFile, "\n\n" . $tableRow['Create Table'] . ";\n\n");

        $tableData = "SELECT * FROM $tableName";
        $dataResult = $conn->query($tableData);

        while ($dataRow = $dataResult->fetch_assoc()) {
            $insertSQL = "INSERT INTO $tableName VALUES (";
            $values = [];

            foreach ($dataRow as $value) {
                $values[] = "'".$conn->real_escape_string($value)."'";
            }

            $insertSQL .= implode(',', $values) . ");\n";
            fwrite($backupFile, $insertSQL);
        }
    }

    fclose($backupFile);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $backupFileName);
    readfile($backupFileName);

    unlink($backupFileName);
} else {
    echo "No se encontraron tablas en la base de datos.";
}

$conn->close();
?>
