<?php
// Incluir el archivo de conexión
include('BD.php'); // Asegúrate de que esta ruta sea correcta

// Seleccionar las contraseñas actuales de los administradores
$sql_admins = "SELECT id_admin, contraseña FROM administradores";
$result_admins = $conn->query($sql_admins);

if ($result_admins->num_rows > 0) {
    while ($row = $result_admins->fetch_assoc()) {
        $id_admin = $row['id_admin'];
        $contraseña_original = $row['contraseña'];

        // Cifrar la contraseña existente
        $hash_contraseña = password_hash($contraseña_original, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $sql_update = "UPDATE administradores SET contraseña = '$hash_contraseña' WHERE id_admin = $id_admin";
        if ($conn->query($sql_update) === TRUE) {
            echo "Contraseña actualizada con éxito para el administrador con ID: $id_admin<br>";
        } else {
            echo "Error al actualizar la contraseña para el administrador con ID: $id_admin<br>";
        }
    }
} else {
    echo "No se encontraron administradores.";
}

$conn->close();
?>
