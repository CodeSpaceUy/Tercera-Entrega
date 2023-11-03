<?php




require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/head.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/config/usuariosDao.php');




if (isset($_SESSION['ci'])) {
    $id = $_POST['id_curso'];
    $nombre = $_POST['nombre_curso'];
    

    // Crear una instancia del objeto usuarioDao
    $objUsuarioDao = new usuarioDao();

    echo $nombre;

    // Intenta insertar los datos y maneja errores si ocurren
    try {
        $resultado = $objUsuarioDao->crearCurso($id, $nombre);
        if ($resultado) {
            echo "Datos insertados con éxito.";
            header("Location: listado_materia.php");

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
    echo "No estas logueado como Administrador";
}
?>
