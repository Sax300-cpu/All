<?php
include('BD.php'); // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Verificar en la tabla de estudiantes
    $sql_estudiante = "SELECT * FROM estudiantes WHERE correo = '$correo'";
    $resultado_estudiante = $conn->query($sql_estudiante);

    if ($resultado_estudiante->num_rows > 0) {
        $usuario = $resultado_estudiante->fetch_assoc();
        if (password_verify($contraseña, $usuario['contraseña'])) {
            session_start();
            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['rol'] = 'estudiante';
            header("Location: indexEstudiante.php"); // Redirige a la página del estudiante
            exit();
        } else {
            echo "<script>
                alert('Contraseña incorrecta');
                window.location.href = 'index.html'; // Redirige al login
            </script>";
            exit();
        }
    }

    // Verificar en la tabla de profesores
    $sql_profesor = "SELECT * FROM profesores WHERE correo = '$correo'";
    $resultado_profesor = $conn->query($sql_profesor);

    if ($resultado_profesor->num_rows > 0) {
        $usuario = $resultado_profesor->fetch_assoc();
        if (password_verify($contraseña, $usuario['contraseña'])) {
            session_start();
            $_SESSION['usuario'] = $usuario['id_profesor'];
            $_SESSION['rol'] = 'profesor';
            header("Location: indexProfesor.php"); // Redirige a la página del profesor
            exit();
        } else {
            echo "<script>
                alert('Contraseña incorrecta');
                window.location.href = 'index.html'; // Redirige al login
            </script>";
            exit();
        }
    }

    // Verificar en la tabla de administradores
    $sql_admin = "SELECT * FROM administradores WHERE correo = '$correo'";
    $resultado_admin = $conn->query($sql_admin);

    if ($resultado_admin->num_rows > 0) {
        $usuario = $resultado_admin->fetch_assoc();
        if (password_verify($contraseña, $usuario['contraseña'])) {
            session_start();
            $_SESSION['admin_id'] = $usuario['id_admin'];
            $_SESSION['rol'] = 'admin';
            header("Location: adminCreacion.php"); // Redirige al panel del administrador
            exit();
        } else {
            echo "<script>
                alert('Contraseña incorrecta');
                window.location.href = 'index.html'; // Redirige al login
            </script>";
            exit();
        }
    }

    // Si no se encuentra el usuario en ninguna tabla
    echo "<script>
        alert('Usuario no encontrado');
        window.location.href = 'index.html';
    </script>";
    exit();
}

$conn->close();
?>
