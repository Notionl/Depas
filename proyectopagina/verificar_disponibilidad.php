<?php
// Configura la conexión a la base de datos. Reemplaza los valores con los tuyos.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "departamentos";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibe los parámetros desde la solicitud AJAX
$ubicacion = $_POST['ubicacion'];

// Consulta para verificar si la ubicación ya está registrada
$sql = "SELECT * FROM pagos WHERE ubicacion = '$ubicacion'";
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "ocupado";
} else {
    echo "disponible";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
