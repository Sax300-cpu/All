<?php
$contraseña_prueba = '$2y$10$vk/Hk8C3Qcik2inDd616aOYwSx.7qGfmRBioXfQWeHzMWD1Bz1r.2';  // Contraseña que quieres probar
$hash_generado = password_hash($contraseña_prueba, PASSWORD_BCRYPT);

if (password_verify($contraseña_prueba, $hash_generado)) {
    echo "El hash coincide con la contraseña ingresada";
} else {
    echo "El hash no coincide";
}
?>

