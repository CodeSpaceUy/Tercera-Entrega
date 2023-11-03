<?php

require_once("view/head/head.php");
include 'config/usuariosDao.php';

// Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoria";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// ID del profesor (reemplaza con el ID del profesor específico)
$id_profe = $_SESSION["ci"];

// Consulta SQL para obtener las tutorías del profesor específico
$sql = "SELECT * FROM tutoria WHERE id_profe = $id_profe";
$result = $conn->query($sql);

if (!isset($_SESSION["id_cargo"])) {
    // Manejar el caso cuando la sesión no está definida
} else {
    if ($_SESSION["id_cargo"] != 2) {
        header("Location: view/home/login.php");
    }
}

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
          <a class = "nav-link" aria-current="page" href="/login/index.php">Inicio</a>
        </li>

        <li class="nav-item nav-item2">
          <a class="nav-link" href="cerrar.php">Cerrar Sesion</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<br>
<div class="container">
<div class="row">
    <div class="col-12">
        <h4>Tutorías Asignadas</h4>
    </div>

    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Próximas Tutorías</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Asunto</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Día Inicio-Fin</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Materiales</th>
                            <th scope="col">Asistencia</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["nombre"] . "</th>";
                                echo "<td>" . $row["curso"] . "</td>";
                                echo "<td>" . $row["fecha_inicio"] . " / " . $row["fecha_fin"] . "</td>";
                                echo "<td>" . $row["hora"] . "</td>";
                                echo "<td>" . $row["periodo"] . "</td>";
                                echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#subir" . $row["id"] . "'>Ver Material</button></td>";
                                echo "<td><a type='button' class='btn btn-primary' href='faltas.php?id_tutoria=" . $row["id"] . "'>Pasar</a></td>";
                                echo "</tr>";
                                // Modal Materiales
                                echo '<div class="modal fade" id="subir' . $row["id"] . '" tabindex="-1" aria-labelledby="subir' . $row["id"] . '" aria-hidden="true">';
                                echo '<div class="modal-dialog">';
                                echo '<div class="modal-content">';
                                echo '<div class="modal-header">';
                                echo '<h1 class="modal-title fs-5" id="subir' . $row["id"] . '">Subir Materiales</h1>';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                echo '</div>';
                                echo '<div class="modal-body">';
                                echo '<form action="subir_archivo.php" method="post" enctype="multipart/form-data">';
                                echo '<input type="hidden" name="id_tutoria" value="' . $row["id"] . '">';
                                echo '<div class="mb-3">';
                                echo '<label for="archivo" class="form-label">Selecciona un archivo:</label>';
                                echo '<input type="file" name="archivo" class="form-control" id="archivo" required>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="modal-footer">';
                                echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
                                echo '<button type="submit" class="btn btn-primary">Guardar</button>';
                                echo '</form>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron tutorías asignadas.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/footer.php');

?>
