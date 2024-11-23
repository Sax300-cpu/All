<?php
$servername = '127.0.0.1:3306';
$username = 'root';
$password = 'Kevin@ndres20';
$dbname = 'BDproyecto';           // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos";
}

$conn->close();  // Cerrar la conexión
?>