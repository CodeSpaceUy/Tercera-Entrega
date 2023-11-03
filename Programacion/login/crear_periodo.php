<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

if (isset($_SESSION['ci'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id_periodo'];
        $nombre = $_POST['nombre_periodo'];

        // Crear una instancia del objeto usuarioDao
        $objUsuarioDao = new usuarioDao();

        // Intenta insertar los datos y maneja errores si ocurren
        try {
            $resultado = $objUsuarioDao->crearPeriodo($id, $nombre); // Asumiendo que existe un método crearPeriodo en usuarioDao
            if ($resultado) {
                echo "Datos insertados con éxito.";
                header("Location: listado_periodo.php");
                exit;
            } else {
                echo "Hubo un error al insertar los datos.";
            }
        } catch (Exception $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
        }
    } else {
        echo "El formulario no se ha enviado correctamente.";
    }
} else {
    echo "No estás logueado como Administrador";
}
?>
