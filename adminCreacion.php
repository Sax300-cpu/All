<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
</head>
<body>
    <h2>Crear Estudiantes y Profesores</h2>
    <form action="process_create_users.php" method="POST">
        <label for="tipo_usuario">Tipo de Usuario:</label>
        <select name="tipo_usuario" id="tipo_usuario" required>
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
        </select>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <br><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>
        <br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" required>
        <br><br>
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>
