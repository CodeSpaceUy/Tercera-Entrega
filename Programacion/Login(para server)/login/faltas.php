<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/head.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/config/usuariosDao.php');

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

        <a href="#" class="selected">
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

// Variable para almacenar el ID de la tutoría
$id_tutoria = null;

// Verificar si se proporcionó un ID de tutoría en la URL
if (isset($_GET['id_tutoria'])) {
    $id_tutoria = $_GET["id_tutoria"];

    // Consulta SQL para obtener estudiantes únicos de una tutoría específica
    $consulta = "SELECT DISTINCT a.id_alumno, u.name, u.surname
                FROM alumnos_tutoria a
                INNER JOIN usuarios u ON a.id_alumno = u.ci
                WHERE a.id_tutoria = $id_tutoria";

    // Ejecutar la consulta
    $result = $mysqli->query($consulta);

    // Comprobar si se encontraron resultados
    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<h1>Estudiantes de la Tutoría</h1>';
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">';
        echo '<tr>';
        echo '<th>Cédula de Identidad</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
            $ci = $row["id_alumno"];
            $nombreEstudiante = $row["name"];
            $apellidoEstudiante = $row["surname"];

            echo '<tr>';
            echo '<td>' . $ci . '</td>';
            echo '<td>' . $nombreEstudiante . '</td>';
            echo '<td>' . $apellidoEstudiante . '</td>';
            echo '<td>';
            echo '<a href="agregarFalta.php?id_tutoria=' . $id_tutoria . '&id_alumno=' . $ci . '" class="btn btn-primary">Agregar Falta</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "No se encontraron estudiantes para esta tutoría.";
    }
} else {
    echo "ID de tutoría no proporcionado.";
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>




