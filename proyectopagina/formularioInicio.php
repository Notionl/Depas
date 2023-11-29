<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'departamentos';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}


    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    $estrellas = $_POST['estrellas'];

    $insertar = "INSERT INTO formulario (nombre, correo, mensaje, estrellas) VALUES ('$nombre', '$correo', '$mensaje', '$estrellas')";

    if ($conexion->query($insertar) === TRUE) {
        header("Location: proyecto.html");
    } else {
        echo "Error al enviar el formulario: " . $conexion->error;
    }


$conexion->close();
?>


