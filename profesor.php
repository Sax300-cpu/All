<?php
// Conectar a la base de datos
include('BD.php');

// Actualizar contraseñas en la base de datos para profesores
$sql = "SELECT id_profesor, contraseña FROM profesores"; // Cambiar 'profesores' a la tabla de profesores
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($usuario = $result->fetch_assoc()) {
        // Cifrar la contraseña
        $hash_contraseña = password_hash($usuario['contraseña'], PASSWORD_BCRYPT);
        
        // Actualizar la contraseña en la base de datos
        $update_sql = "UPDATE profesores SET contraseña = '$hash_contraseña' WHERE id_profesor = " . $usuario['id_profesor'];
        $conn->query($update_sql);
    }
    echo "Contraseñas de profesores actualizadas con éxito.";
} else {
    echo "No se encontraron usuarios de profesores para actualizar.";
}

$conn->close();
?>
