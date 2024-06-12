<?php
session_start();
include 'funciones.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    // Verificar si el usuario existe en la base de datos
    $user = getUserByUsername($conn, $username);
    print_r($user);
    if ($user && $user['password_hash']) {
        // Iniciar sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        // Redirigir a la página deseada después del login (por ejemplo, index.php)
        header("Location: index.php");
        exit;
    } else {
        // Usuario o contraseña incorrectos
        echo "Usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>