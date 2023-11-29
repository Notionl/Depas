<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "departamentos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$correo = $_POST['correoInicio'];
$password = $_POST['passwordInicio'];

// Utilizar consultas preparadas para prevenir la inyección SQL
$stmt = $conn->prepare("SELECT * FROM registro WHERE correo = ? AND password = ?");
$stmt->bind_param("ss", $correo, $password);

// Ejecutar la consulta
$stmt->execute();

// Obtener resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario válido

    if ($correo === 'admin735@gmail.com' && $password === 'administrador') {
        // Credenciales de administrador, redirige a admin.html
        header("Location: admin.html");
    } else {
        // Credenciales normales, redirige a la página de inicio
        header("Location: proyecto.html");
    }
} else {
    // Usuario inválido, muestra un mensaje
    echo "Correo electrónico o contraseña incorrectos.";
}

// Cerrar la conexión y liberar los recursos
$stmt->close();
$conn->close();
?>
