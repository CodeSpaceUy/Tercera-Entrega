<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

session_start();

if (isset($_POST["ci"]) && isset($_POST["password"])) {
    $txtUsuario = $_POST["ci"];
    $txtPassword = $_POST["password"];

    // Llama a la función login que debe devolver el id_cargo (rol) del usuario
    $id_cargo = usuarioDao::login($txtUsuario, $txtPassword);

    if ($id_cargo !== false) {
        // Almacena el id_cargo en una variable de sesión
        $_SESSION['id_cargo'] = $id_cargo;

        // Almacena la CI en una variable de sesión
        $_SESSION['ci'] = $txtUsuario;

        // Redirige según el id_cargo
        if ($id_cargo == 1) {
            // Redirigir al administrador
            header("Location: ../../admin.php");
            exit;
        } elseif ($id_cargo == 2) {
            // Redirigir al estudiante
            header("Location: ../../profesor.php");
            exit;
        } elseif ($id_cargo == 3) {
            // Redirigir al profesor
            header("Location: ../../estudiante.php");
            exit;
        }
    }
}

echo "No logueado";
?>
