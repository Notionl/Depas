<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "departamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombreRegi'];
$correo = $_POST['correoRegi'];
$password = $_POST['passwordRegi'];
$confirmarPassword = $_POST['confirmarPasswordRegi'];

// Verifica que las contraseñas coincidan
if ($password != $confirmarPassword) {
    echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
} else {
    // Continúa con el registro si las contraseñas coinciden
    $sql = "INSERT INTO registro (nombre, correo, password) VALUES ('$nombre', '$correo', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
