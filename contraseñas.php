<?php
$contraseña_prueba = '$2y$10$P7DBvae1IWsr0bGYbJ2t/O5YkOtEHJbqAW4yRfx94PK78Wo1jNYYG';  // Contraseña que quieres probar
$hash_generado = password_hash($contraseña_prueba, PASSWORD_BCRYPT);

if (password_verify($contraseña_prueba, $hash_generado)) {
    echo "El hash coincide con la contraseña ingresada";
} else {
    echo "El hash no coincide";
}
?>

