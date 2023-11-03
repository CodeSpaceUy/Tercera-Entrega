<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">

    <header>
      <div class="icon__menu">
        <i class="fas fa-bars" id="btn_open" onclick="abrir()"></i>
      </div>
    </header>

    <div class="menu__side veri verido" id="menu_side">

      <div class="name__page">
        <i class="fab fa-youtube"></i>
        <h4>Ututorias</h4>
      </div>

      <div class="options__menu">

        <a href="profesor.php" class="selected">
          <div class="option">
            <i class="fas fa-home" title="Inicio"></i>
            <h4>Tutorias</h4>
          </div>
        </a>

        



      </div>

    </div>



    <a class="navbar-brand" href="/login/index.php">
      <img class="logoutu"
        src="https://www.utu.edu.uy/sites/www.utu.edu.uy/files/utu/recursos/LOGO-ANEP-DGETP---2021-Fondo-Transparente.png"
        alt="Logo Tutorias">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login/index.php">Inicio</a>
</li>
        <li class="nav-item nav-item2">
          <a class="nav-link" href="cerrar.php">Cerrar Sesion</a>
        </li>

      </ul>
    </div>


  </div>
</nav>

<?php

// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$database = "tutoria";

// Crear una conexión
$mysqli = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Variable para almacenar el ID de la tutoría y el ID del alumno
$id_tutoria = null;
$id_alumno = null;

// Verificar si se proporcionaron ID de tutoría y ID de alumno en la URL
if (isset($_GET['id_tutoria']) && isset($_GET['id_alumno'])) {
    $id_tutoria = $_GET['id_tutoria'];
    $id_alumno = $_GET['id_alumno'];

    // Verifica si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera los valores de asistencia, inasistencias justificadas e inasistencias injustificadas del formulario
        $asistencia = $_POST['asistencia'];
        $inasistencias_justificadas = $_POST['inasistencias_justificadas'];
        $inasistencias_injustificadas = $_POST['inasistencias_injustificadas'];
        $fecha = date('Y-m-d'); // Fecha actual

        // Prepara la consulta SQL para insertar la falta
        $consulta = "INSERT INTO asistencias (ci, tutoria_id, asistencia, inastencias_justificadas, inastencias_ijustificadas, fecha) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepara la sentencia SQL
        $stmt = $mysqli->prepare($consulta);

        // Verifica si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincula los parámetros
            $stmt->bind_param('siiiss', $id_alumno, $id_tutoria, $asistencia, $inasistencias_justificadas, $inasistencias_injustificadas, $fecha);

            // Ejecuta la consulta
            if ($stmt->execute()) {
            } else {
                echo "Error al agregar la falta: " . $stmt->error;
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $mysqli->error;
        }
    }
} else {
    echo "ID de tutoría o ID de alumno no proporcionados.";
}

// Cierra la conexión a la base de datos
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Falta</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Falta</h1>
        <form method="post">
            <label for="asistencia">Asistencia:</label>
            <input type="number" name="asistencia" required><br>
            <label for="inasistencias_justificadas">Inasistencias Justificadas:</label>
            <input type="number" name="inasistencias_justificadas" required><br>
            <label for="inasistencias_injustificadas">Inasistencias Injustificadas:</label>
            <input type="number" name="inasistencias_injustificadas" required><br>
            <button type="submit">Agregar Falta</button>
        </form>
    </div>
</body>
</html>

