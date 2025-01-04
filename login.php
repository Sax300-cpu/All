<?php
include('BD.php');  // Asegúrate de que esta ruta sea correcta

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Verificar si el usuario es un estudiante
    $sql_estudiante = "SELECT * FROM estudiantes WHERE correo = '$correo'";
    $result_estudiante = $conn->query($sql_estudiante);

    if ($result_estudiante->num_rows > 0) {
        $usuario = $result_estudiante->fetch_assoc();
        // Verificar la contraseña utilizando password_verify()
        if (password_verify($contraseña, $usuario['contraseña'])) {
            echo "Login exitoso como Estudiante";
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        // Verificar si el usuario es un profesor
        $sql_profesor = "SELECT * FROM profesores WHERE correo = '$correo'";
        $result_profesor = $conn->query($sql_profesor);

        if ($result_profesor->num_rows > 0) {
            $usuario = $result_profesor->fetch_assoc();
            // Verificar la contraseña utilizando password_verify()
            if (password_verify($contraseña, $usuario['contraseña'])) {
                echo "Login exitoso como Profesor";
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            // Verificar si el usuario es un administrador
            $sql_admin = "SELECT * FROM administradores WHERE correo = '$correo'";
            $result_admin = $conn->query($sql_admin);

            if ($result_admin->num_rows > 0) {
                $usuario = $result_admin->fetch_assoc();
                // Verificar la contraseña utilizando password_verify()
                if (password_verify($contraseña, $usuario['contraseña'])) {
                    session_start();
                    $_SESSION['admin_id'] = $usuario['id_admin']; // Guardar en sesión
                    header("Location: adminCreacion.php"); // Redirigir al panel del administrador
                    exit();
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario no encontrado";
            }
        }
    }
}

$conn->close();  // Cerrar la conexión a la base de datos
?>
