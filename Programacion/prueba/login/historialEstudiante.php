<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/head.php');


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
                <a href="estudiante.php">
                    <div class="option">
                        <i class="fas fa-home" title="Inicio"></i>
                        <h4>Tutorias</h4>
                    </div>
                </a>

                <a href="#" class="selected">
                    <div class="option">
                        <i class="far fa-file" title="Historial"></i>
                        <h4>Historial de Solicitudes</h4>
                    </div>
                </a>

                <a href="micuentaEstudiante.php">
                    <div class="option">
                        <i class="far fa-id-badge" title="Cuenta"></i>
                        <h4>Mi Cuenta</h4>
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

<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Historial Estudiante</h4>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Tutorias Solicitadas
                </div>
                <div class="col"></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Asunto</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Día</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Periodo</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Estado de Solicitud</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $conexion = new mysqli("localhost", "root", "", "tutoria");

                            $ci = $_SESSION["ci"];
                            $query = "SELECT * FROM solicitudTutoria WHERE CI = '$ci'";
                            $result = mysqli_query($conexion, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $row['asunto'] . "</th>";
                                    echo "<td>" . $row['curso'] . "</td>";
                                    echo "<td>" . "Sin Asignar" . "</td>";
                                    echo "<td>" . "Sin Asignar" . "</td>";
                                    echo "<td>" . $row['periodo'] . "</td>";
                                    echo "<td>" . $row['comentarios'] . "</td>";
                                    echo "<td><a class='btn btn-primary' href='#' role='button'>Ver Estado</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h1 class="p-1"></h1>

        <?php
        // Realiza la conexión a la base de datos (reemplaza con tus propias credenciales)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tutoria";

        // Crea una conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Realiza la consulta SQL para obtener las tutorías tomadas por el usuario (reemplaza 'tu_usuario' por la columna correcta en tu tabla)
        $ci = $_SESSION["ci"];
        $sql = "SELECT DISTINCT id_tutoria, observaciones, horaTutoria FROM alumnos_tutoria WHERE id_alumno = '$ci' GROUP BY id_tutoria";

        $result = $conn->query($sql);

        // Cierra la conexión a la base de datos
        $conn->close();
        ?>

        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    Tutorías que tomaste
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id Tutoria</th>
                                <th scope="col">Observacion</th>
                                <th scope="col">Hora</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $row["id_tutoria"] . "</th>";
                                    echo "<td>" . $row["observaciones"] . "</td>";
                                    echo "<td>" . $row["horaTutoria"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No has tomado ninguna tutoría.</td></tr>";
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
