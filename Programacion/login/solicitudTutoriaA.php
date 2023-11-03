<?php
require_once("C:/xampp/htdocs/login/view/head/head.php");

include 'C:\xampp\htdocs\login\config\usuariosDao.php';

$objUsuarioDao = new usuarioDao();
$usuarios = $objUsuarioDao->obtenerTodosLosUsuarios();
$tutorias = $objUsuarioDao->obtenerTutoriasEstudiante();




if (isset($_POST['eliminar'])) {
    if (isset($_POST['ci_eliminar'])) {
        $ci = $_POST['ci_eliminar']; // Obtén el valor de ci del campo oculto

        if ($objUsuarioDao->eliminarUsuarioPorCi($ci)) {
            // Redirige a la página de listado de usuarios o muestra un mensaje de éxito
            header("Location: adminListarUsuarios.php"); // Cambia "adminListarUsuario.php" por la página deseada
            exit; // Importante: detener la ejecución del script después de redireccionar
        } else {
            // Maneja el caso de error en la eliminación según tus necesidades
            echo "Error al eliminar el usuario.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorias que solicitan estudiantes</title>
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

        <a href="solicitudTutoriaA.php" class="selected">
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

<br><br>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Tutorias que solicitan estudiantes
                    </div>
                    <div class="col"></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Comentarios</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tutorias as $tutoria) { ?>
                                    <tr>
                                        <td><?php echo $tutoria->getAsunto(); ?></td>
                                        <td><?php echo $tutoria->getCI(); ?></td>
                                        <td><?php echo $tutoria->getCurso(); ?></td>
                                        <td><?php echo $tutoria->getPeriodo(); ?></td>
                                        <td><?php echo $tutoria->getComentarios(); ?></td>
                                        <td><a class="btn btn-primary" href="modificarTutoria.php?id=<?php echo $tutoria->getIdSolicitud(); ?>">Editar</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




 

  


</body>
</html>
