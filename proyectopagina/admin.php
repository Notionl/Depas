 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "departamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el propietario del formulario
$propietario = $_POST['propietario'];

// Consulta SQL para obtener los datos de pagos del propietario
$sql = "SELECT id_pagos, dateStart, endDate, precio, ubicacion FROM pagos WHERE propietario = '$propietario'";
$result = $conn->query($sql);

$pagos = array();

if ($result->num_rows > 0) {
    // Obtener los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        $pagos[] = $row;
    }
}

// Enviar los datos como respuesta JSON
header('Content-Type: application/json');
echo json_encode($pagos);

$conn->close();
?>
