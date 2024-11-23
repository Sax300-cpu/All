<?php
// Incluir el archivo de conexión
include('BD.php');  // Asegúrate de que esta ruta sea correcta

// Script para actualizar las contraseñas de los administradores
$sql_admins = "SELECT * FROM administradores";  // Selecciona todos los administradores
$result_admins = $conn->query($sql_admins);

if ($result_admins->num_rows > 0) {
    // Recorrer todos los administradores
    while ($row = $result_admins->fetch_assoc()) {
        // Generar una nueva contraseña cifrada
        $id_admin = $row['id_admin'];  // Obtener el ID del administrador
        $nueva_contraseña = password_hash("nuevaContraseñaAdmin", PASSWORD_DEFAULT);  // Cifra la nueva contraseña

        // Actualizar la contraseña en la base de datos
        $sql_update = "UPDATE administradores SET contraseña = '$nueva_contraseña' WHERE id_admin = $id_admin";
        if ($conn->query($sql_update) === TRUE) {
            echo "Contraseña actualizada con éxito para el administrador con ID: $id_admin<br>";
        } else {
            echo "Error al actualizar la contraseña para el administrador con ID: $id_admin<br>";
        }
    }
} else {
    echo "No se encontraron administradores.";
}

// Cerrar la conexión
$conn->close();
?>
