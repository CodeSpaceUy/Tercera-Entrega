<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

if (isset($_SESSION['ci']) && isset($_GET['id'])) {
    $idUsuario = $_SESSION['ci'];
    $idTutoria = $_GET['id'];
    $diaTutoria = "sssa"; // Define el valor adecuado
    $observaciones = "sasdn"; // Define el valor adecuado
    $horaTutoria = "sasn"; // Define el valor adecuado

    // Crear una instancia del objeto usuarioDao
    $objUsuarioDao = new usuarioDao();

    echo "$idUsuario";


    // Intenta insertar los datos y maneja errores si ocurren
    try {
        $resultado = $objUsuarioDao->unirse($idUsuario, $idTutoria, $diaTutoria, $observaciones, $horaTutoria);
        if ($resultado) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Hubo un error al insertar los datos.";
        }
    } catch (Exception $e) {
        echo "Error al insertar los datos: " . $e->getMessage();
    }

    // Redirigir a la página de tutorías o a donde desees después de unirse.
    // header("Location: estudiante.php");

    exit;
} else {
    // Manejar el caso si no está iniciada la sesión o el ID de la tutoría no está definido.
}
?>
