<?php
// db.php - Conexión a la base de datos MySQL
$servername = "127.0.0.1:3306";  // Usualmente 'localhost' en XAMPP
$username = "root";        // Usuario por defecto de MySQL en XAMPP
$password = "Kevin@ndres20";            // Contraseña vacía en XAMPP por defecto
$dbname = "uta";  // Cambia por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>