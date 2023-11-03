<?php
require_once("view/head/head.php");

// Incluye el archivo de la clase Tutorias y UsuarioDao (asegúrate de que la ruta sea correcta)
include 'config\usuariosDao.php';

$objUsuarioDao = new usuarioDao();

// Verifica si se ha proporcionado un ID de tutoría para editar
if (isset($_GET['id'])) {
  $idTutoria = $_GET['id'];

  echo ($idTutoria);

  // Obtener la tutoría por su ID
  $tutoria = $objUsuarioDao->obtenerTutoriaPorId($idTutoria);

  if ($tutoria === null) {
    // La tutoría no se encontró, puedes manejar este caso según tus necesidades
  }
}



// Verifica si se envió el formulario de actualización
if (isset($_POST['actualizar'])) {
  // Obtén los valores del formulario
  $nombre = $_POST['nombre'];
  $fechaInicio = $_POST['fecha_inicio'];
  $fechaFin = $_POST['fecha_fin'];
  $hora = $_POST['hora'];
  $comentarios = $_POST['comentarios'];

  // Actualiza los datos de la tutoría con los valores del formulario
  $tutoria->setId($idTutoria);

  $tutoria->setNombre($nombre);
  $tutoria->setFechaInicio($fechaInicio);
  $tutoria->setFechaFin($fechaFin);
  $tutoria->setHora($hora);
  $tutoria->setComentarios($comentarios);

  // Realiza la actualización en la base de datos
  if ($objUsuarioDao->actualizarTutoria($tutoria)) {
    // Redirige a la página de listado de tutorías o muestra un mensaje de éxito
    header("Location: admin.php"); //Cambia "lista_tutorias.php" por la página deseada

    exit; // Importante: detener la ejecución del script después de redireccionar
  } else {
    // Maneja el caso de error en la actualización según tus necesidades
    echo "Error al actualizar la tutoría.";
  }
}


if (isset($_POST['eliminar'])) {

  // Realiza la eliminación en la base de datos
  if ($objUsuarioDao->eliminarTutoria($idTutoria)) {
      // Redirige a la página de listado de tutorías o muestra un mensaje de éxito
      header("Location: admin.php"); // Cambia "admin.php" por la página deseada

      exit; // Importante: detener la ejecución del script después de redireccionar
  } else {
      // Maneja el caso de error en la eliminación según tus necesidades
      echo "Error al eliminar la tutoría.";
  }
}


?>

<!-- Aquí puedes colocar tu formulario HTML para editar la tutoría -->


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

        <a href="admin.php" class="selected">
          <div class="option">
            <i class="fas fa-home" title="Inicio"></i>
            <h4>Tutorias</h4>
          </div>
        </a>

        <a href="adminListarUsuarios.php">
          <div class="option">
            <i class="far fa-file" title="Usuarios"></i>
            <h4>Usuarios</h4>
          </div>
        </a>

        <a href="solicitudTutoriaA.php">
          <div class="option">
            <i class="fas fa-video" title="Cursos"></i>
            <h4>Notificaciones</h4>
          </div>
        </a>

        <a href="listado_periodo.php">
          <div class="option">
            <i class="far fa-sticky-note" title="Blog"></i>
            <h4>Mi cuenta</h4>
          </div>
        </a>

        <a href="listado_materia.php">
          <div class="option">
            <i class="far fa-id-badge" title="Contacto"></i>
            <h4>Mi Institucion</h4>
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

      <div class="card">
        <div class="card-header">
          Modificar Tutoria
        </div>

        <?php if ($tutoria !== null) { ?>
          <form class="row g-3 needs-validation crear_tutoria" method="POST" novalidate>

            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Nombre de la tutoria</label>
              <input type="text" class="form-control" id="materia" name="nombre"
                value="<?php echo $tutoria->getNombre(); ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Fecha Inicio</label>
              <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                value="<?php echo $tutoria->getFechaInicio(); ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Fecha Fin</label>
              <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                value="<?php echo $tutoria->getFechaFin(); ?>" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom05" class="form-label">Hora</label><br>
              <textarea name="hora" id="hora" cols="40" rows="2"
                placeholder="<?php echo $tutoria->getHora(); ?>"></textarea>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom05" class="form-label">Comentarios</label><br>
              <textarea name="comentarios" id="comentarios" cols="40" rows="2"
                placeholder="<?php echo $tutoria->getComentarios(); ?>"></textarea>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
            

            <div class="col-12">
              <input class="btn btn-primary" type="submit" name="actualizar" value="Actualizar">
              <input class="btn btn-danger" type="submit" name="eliminar" value="eliminar">
            </div>
        </div>



        </form>
      <?php } else { ?>
        <p>Usuario no encontrado.</p>
      <?php } ?>

    </div>


  </div>

  <br><br>

  

    </div>
    <!-- <div class="col-7 ">
      <div class="card">
        <h5 class="card-header">Proximas Tutorias</h5>
        <div class="card-body">


          <table class="table">
            <thead>
              <tr>
                <th scope="col">Asunto</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Dia</th>
                <th scope="col">Hora</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Unirme</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">Matematica 1</th>
                <td>Matematica</td>
                <td>2023-06-24</td>
                <td>9:15-9:55</td>
                <td>Presencial</td>
                <td><a class="btn btn-primary" href="#" role="button">Unirme</a>
                </td>
              </tr>
              <tr>
                <th scope="row">Programacion 1</th>
                <td>Programacion</td>
                <td>2023-06-27</td>
                <td>9:15-9:55</td>
                <td>Presencial</td>
                <td><a class="btn btn-primary" href="#" role="button">Unirme</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>



  </div>-->
  </div>




  <?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/footer.php');

  ?>