<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");

include 'C:\xampp\htdocs\login\config\usuariosDao.php';

$objUsuarioDao = new usuarioDao();
$usuarios = $objUsuarioDao->obtenerTodosLosUsuarios();
$cursos = $objUsuarioDao->obtenerTodosLosCursos();
$periodos = $objUsuarioDao->obtenerTodosLosPeriodos();


if (isset($_POST['periodo_eliminar']) && isset($_POST['periodo_eliminar'])) {
    $idCursoEliminar = $_POST['periodo_eliminar'];

    // Llama a la función para eliminar el curso
    if ($objUsuarioDao->eliminarPeriodo($idCursoEliminar)) {
        // Éxito: El curso se eliminó correctamente
    } else {
        // Error: No se pudo eliminar el curso
        echo "Error al eliminar el curso.";
    }
} else {
    // Manejar el caso si no se envió el formulario correctamente
}



if (isset($_POST['eliminar'])) {
  if (isset($_POST['periodo_eliminar'])) {
      $idPeriodoEliminar = $_POST['periodo_eliminar'];

      // Llama a la función para eliminar el periodo
      if ($objUsuarioDao->eliminarPeriodo($idPeriodoEliminar)) {
          // Éxito: El periodo se eliminó correctamente
      } else {
          // Error: No se pudo eliminar el periodo
          echo "Error al eliminar el periodo.";
      }
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Periodos</title>
</head>
<body>




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

        <a href="admin.php" >
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

        <a href="listado_periodo.php" class="selected">
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

<div class="container">
<div class="row">
 
<br>

    <div class="col-12">
<h1>Listado de Periodos</h1>
<form class="row g-3 needs-validation crear_tutoria" method="POST" novalidate>
        <table>
            <tr>
                <th>ID Periodo</th>
                <th>Nombre del Periodo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($periodos as $periodo) { ?>
                <tr>
                    <td><?php echo $periodo->getId(); ?></td>
                    <td><?php echo $periodo->getNombre(); ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="periodo_eliminar" value="<?php echo $periodo->getId(); ?>">
                            <input class="btn btn-danger" type="submit" name="eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>

<!-- Agregar un nuevo periodo -->
<form action="crear_periodo.php" class="g-3 needs-validation" novalidate method="POST">
    <h1 class="text-center">Alta de Periodo</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">ID del Periodo</label>
                <input type="text" class="form-control" id="id_periodo" name="id_periodo" required>
                <div class="valid-feedback">Ok!</div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nombre del Periodo</label>
                <input type="text" class="form-control" id="nombre_periodo" name="nombre_periodo" required>
                <div class="valid-feedback">Ok!</div>
            </div>
            <div class="col-12">
                <button type="submit">Crear Periodo</button>
            </div>
        </div>
    </div>
</form>


    </div>            


</div>






</div>




 

  
</body>
</html>
