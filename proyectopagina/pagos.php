<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'departamentos';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$propietario = $_POST['propietario'];
$dateStart = $_POST['dateStart'];
$endDate = $_POST['endDate'];
$cardNumber = encrypt($_POST['cardNumber']);
$expiryDate = encrypt($_POST['expiryDate']);
$cvv = encrypt($_POST['cvv']);
$precio = $_POST['precio'];
$ubicacion = $_POST['ubicacion']; 

$insertar = "INSERT INTO pagos (propietario, dateStart, endDate, cardNumber, expiryDate, cvv, precio, ubicacion) 
             VALUES ('$propietario', '$dateStart', '$endDate', '$cardNumber', '$expiryDate', '$cvv', $precio, '$ubicacion')";

if ($conexion->query($insertar) === TRUE) {
    header("Location: proyecto.html");
} else {
    echo "Error al realizar el pago: " . $conexion->error;
}

$conexion->close();

function encrypt($data) {
    return password_hash($data, PASSWORD_DEFAULT);
}
?>
