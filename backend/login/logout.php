<?php
session_start(); // Iniciar sesión si aún no está iniciada

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario al inicio de sesión u otra página deseada
header("Location:/index.html");
exit;
?>











