<?php
// Conexión a la base de datos
include 'BD.php'; // Archivo de conexión

// Obtener los datos del formulario
$tipo_usuario = $_POST['tipo_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Cifrar la contraseña

// Determinar la tabla de destino
if ($tipo_usuario === 'estudiante') {
    $tabla = 'estudiantes';
} elseif ($tipo_usuario === 'profesor') {
    $tabla = 'profesores';
} else {
    die('Tipo de usuario no válido.');
}

// Preparar la consulta SQL
$sql = "INSERT INTO $tabla (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)";

// Ejecutar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $nombre, $apellido, $correo, $contraseña);

if ($stmt->execute()) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error al crear el usuario: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
