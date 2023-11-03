<?php
// Incluye el archivo de la clase Tutorias y UsuarioDao (asegúrate de que la ruta sea correcta)
include($_SERVER['DOCUMENT_ROOT'] . '/login/config/usuariosDao.php');

$idProfe = $_POST["profesor"];
$nombre = $_POST["materia"];
$curso = $_POST["curso"];
$periodo = $_POST["periodo"];
$fechaInicio = $_POST["fecha_inicio"];
$fechaFin = $_POST["fecha_fin"];
$hora = $_POST["hora"];
$comentarios = $_POST["comentarios"];




$tutoria = new Tutorias();
$tutoria->setIdProfe("$idProfe"); // Establecer el ID del profesor
$tutoria->setNombre("$nombre");
$tutoria->setCurso("$curso");
$tutoria->setPeriodo("$periodo");
$tutoria->setFechaInicio("$fechaInicio");
$tutoria->setFechaFin("$fechaFin");
$tutoria->setHora("$hora");
$tutoria->setComentarios("$comentarios");

var_dump($tutoria);

// Verificar si el ID de profesor existe antes de crear la tutoría
if (UsuarioDao::existeProfesor($tutoria->getIdProfe())) {
    // Llamar a la función crearTutoria para guardar la tutoría
    $resultado = UsuarioDao::crearTutoria($tutoria);

    // Verificar si la tutoría se guardó exitosamente
    if ($resultado) {
        header("Location: admin.php");
    exit;
    } else {
        echo "Error al guardar la tutoría";
    }
} else {
    echo "El ID de profesor no existe en la tabla de profesores.";
}
?>
