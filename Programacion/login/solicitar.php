<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

if (isset($_SESSION['ci'])) {
    $idSolicitud = "";
    $asunto = $_POST['asunto'];
    $CI = $_POST['ci']; // Define el valor adecuado
    $curso = $_POST['curso']; // Define el valor adecuado
    $periodo = $_POST['periodo']; // Define el valor adecuado
    $comentarios = $_POST['comentarios']; // Define el valor adecuado


    // Crear una instancia del objeto usuarioDao
    $objUsuarioDao = new usuarioDao();


    // Intenta insertar los datos y maneja errores si ocurren
    try {
        $resultado = $objUsuarioDao->solicitarTutoria($idSolicitud, $asunto, $CI, $curso, $periodo, $comentarios);
        if ($resultado) {
            echo "Datos insertados con éxito.";
            header("Location: estudiante.php");

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
