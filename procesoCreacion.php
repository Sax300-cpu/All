<?php
include('BD.php'); // Asegúrate de que la conexión a la base de datos está correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Cifrar contraseña
    $rol = $_POST['rol'];

    if ($rol === 'estudiante') {
        $sql = "INSERT INTO estudiantes (nombre, apellido, correo, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$contraseña')";
    } elseif ($rol === 'profesor') {
        $sql = "INSERT INTO profesores (nombre, apellido, correo, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$contraseña')";
    }

    if ($conn->query($sql) === TRUE) {
        // Mostrar un mensaje de éxito con JavaScript
        echo "<script>
            alert('Usuario creado exitosamente');
            window.location.href = 'adminCreacion.php';
        </script>";
        exit();
    } else {
        // Mostrar un mensaje de error con JavaScript
        echo "<script>
            alert('Error al crear el usuario: " . $conn->error . "');
            window.location.href = 'adminCreacion.php';
        </script>";
        exit();
    }
}
$conn->close();
?>