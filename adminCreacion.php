<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php"); // Redirigir al login si no está logueado
    exit();
}

include('BD.php');

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
        echo "Usuario creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/estilos2.0.css">
</head>
<body>
    <div class="Creation">
        <h1>Bienvenido Administrador</h1>
        <form method="POST" action="adminCreacion.php">
            <div class="cajas">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <select name="rol" required>
                    <option value="estudiante">Estudiante</option>
                    <option value="profesor">Profesor</option>
                </select>
            </div>
            <button type="submit">Crear Usuario</button>
        </form>
    </div>
</body>
</html>