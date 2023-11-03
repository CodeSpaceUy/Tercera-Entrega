<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/head.php');

include($_SERVER['DOCUMENT_ROOT'] . '/login/config/usuariosDao.php');


$objUsuarioDao = new usuarioDao();

// Obtener los valores de la tabla usuarios
$cursos = $objUsuarioDao->obtenerTodosLosCursos();
$periodos = $objUsuarioDao->obtenerTodosLosPeriodos();
$estudiantes = $objUsuarioDao->obtenerTodosLosEstudiantes();
$profesores = $objUsuarioDao->obtenerTodosLosProfesores();
$tutorias = $objUsuarioDao->obtenerTutorias();


if(!isset($_SESSION["id_cargo"])){

}else{
  if($_SESSION["id_cargo"] != 1){
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
    <div class="col-5 ">
      <div class="card ">
        <div class="card-header">
          Crear tutoría
        </div>
        <div class="card-body">

          <form class="row g-3 needs-validation crear_tutoria" action="crear_tutoria.php" method="POST" novalidate>
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Nombre de la tutoria</label>
              <input type="text" class="form-control" id="materia" name="materia" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-6 ">
              <label for="validationCustom04" class="form-label">Curso</label>
              <select class="form-select" required name="curso" id="curso">
                <?php foreach ($cursos as $curso): ?>
                  <option value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNombre(); ?></option>
                <?php endforeach; ?>
              </select>

              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="validationCustom04" class="form-label">Periodo</label>
              <select class="form-select" id="validationCustom04" required name="periodo" id="periodo">
                <?php foreach ($periodos as $periodo): ?>
                  <option value="<?php echo $periodo->getId(); ?>"><?php echo $periodo->getNombre(); ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom04" class="form-label">Profesor</label>
              <select class="form-select" id="validationCustom04" required name="profesor" id="profesor">
                <?php foreach ($profesores as $profesor): ?>
                  <option value="<?php echo $profesor->getCi(); ?>"><?php echo $profesor->getName(); ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Fecha Inicio</label>
              <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="Mark" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom01" class="form-label">Fecha Fin</label>
              <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="Mark" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom05" class="form-label">Hora</label><br>
              <textarea name="hora" id="hora" cols="40" rows="2"></textarea>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom05" class="form-label">Comentarios</label><br>
              <textarea name="comentarios" id="comentarios" cols="40" rows="2"></textarea>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
           
            
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Crear Tutoria</button>
            </div>
          </form>


        </div>
      </div>
    </div>

    <div class="col-7">
    <div class="row">
        


        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    Tutorias
                </div>
                <div class="col"></div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Asunto</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Periodo</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php foreach ($tutorias as $tutoria) { ?>
            <tr>
                <td><?php echo $tutoria->getNombre(); ?></td>
                <td><?php echo $tutoria->getCurso(); ?></td>
                <td><?php echo $tutoria->getHora(); ?></td>
                <td><?php echo $tutoria->getPeriodo(); ?></td>
                <td><?php echo $tutoria->getComentarios(); ?></td>
                <td><a class="btn btn-primary" href="modificarTutoria.php?id=<?php echo $tutoria->getId(); ?>">Editar</a>
            </tr>
                        <?php } ?>


                           
                        </tbody>
                    </table>


                </div>
            </div>
        </div>




    </div>
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



  </div>
</div> -->




    <?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/login/view/head/footer.php');
    

    ?>