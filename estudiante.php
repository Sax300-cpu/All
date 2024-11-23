<?php
// Conectar a la base de datos
include('BD.php');

// Actualizar contraseñas en la base de datos para estudiantes
$sql = "SELECT id, contraseña FROM estudiantes"; // Aquí puedes cambiar 'estudiantes' a la tabla que necesites
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($usuario = $result->fetch_assoc()) {
        // Cifrar la contraseña
        $hash_contraseña = password_hash($usuario['contraseña'], PASSWORD_BCRYPT);
        
        // Actualizar la contraseña en la base de datos
        $update_sql = "UPDATE estudiantes SET contraseña = '$hash_contraseña' WHERE id = " . $usuario['id'];
        $conn->query($update_sql);
    }
    echo "Contraseñas actualizadas con éxito.";
} else {
    echo "No se encontraron usuarios para actualizar.";
}

$conn->close();
?>
