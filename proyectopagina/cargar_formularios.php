<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "departamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_formulario, nombre, correo, mensaje, estrellas FROM formulario";
$result = $conn->query($sql);

$formularios = array();

if ($result->num_rows > 0) {
    // Obtener los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        $formularios[] = $row;
    }
}

// Enviar los datos como respuesta JSON
header('Content-Type: application/json');
echo json_encode($formularios);

$conn->close();
?>
