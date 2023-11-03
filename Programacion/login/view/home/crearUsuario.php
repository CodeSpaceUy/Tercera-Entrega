<?php
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

$ci = $_POST["ci"];
$correo = $_POST["correo"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$password = $_POST["contra"];
$passwordTwo = $_POST["contraDos"];

if (empty($correo) || empty($password) || empty($passwordTwo)) {
    $error .= "<li>Completa los campos</li>";
    header("Location: singup.php?error=".$error."&correo=".$correo."&contraseña=".$password."&confirmarContraseña=".$passwordTwo);
} else if ($password == $passwordTwo) {
    $obj = new usuarioDao();

    $usuario = new Usuarios();
    $usuario->setCi($ci);
    $usuario->setCorreo($correo);
    $usuario->setName($name);
    $usuario->setSurname($surname);
    
    // Encripta la contraseña antes de guardarla en la base de datos
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $usuario->setPassword($hashedPassword);
    
    $usuario->setVerifiacion("1"); // Ajusta esto según tus necesidades

    if ($obj->guardarUsuario($usuario) === false) {
        $error .= "<li>El correo o CI ya están registrados</li>";
        header("Location: singup.php?error=".$error."&correo=".$correo."&contraseña=".$password."&confirmarContraseña=".$passwordTwo);
    } if (isset($_SESSION['ci'])){
        header("Location: adminListarUsarios.php");
    }else{
        header("Location: login.php");

    }
} else {
    $error .= "<li>Las contraseñas no son iguales</li>";
    header("Location: singup.php?error=".$error."&correo=".$correo."&contraseña=".$password."&confirmarContraseña=".$passwordTwo);
}
?>
