<?php
require_once("view/head/head.php");

include 'config/usuariosDao.php';

$objUsuarioDao = new usuarioDao();
$usuarios = $objUsuarioDao->obtenerTodosLosUsuarios();
$cursos = $objUsuarioDao->obtenerTodosLosCursos();
$periodos = $objUsuarioDao->obtenerTodosLosPeriodos();


if (isset($_POST['eliminar']) && isset($_POST['curso_eliminar'])) {
    $idCursoEliminar = $_POST['curso_eliminar'];

    // Llama a la función para eliminar el curso
    if ($objUsuarioDao->eliminarCurso($idCursoEliminar)) {
        // Éxito: El curso se eliminó correctamente
    } else {
        // Error: No se pudo eliminar el curso
        echo "Error al eliminar el curso.";
    }
} else {
    // Manejar el caso si no se envió el formulario correctamente
}



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
    <title>Listado de Usuarios</title>
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

        <a href="adminListarUsuarios.php" class="selected">
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

<div class="container">
<div class="row">
    <div class="col-6">   
        <table>
        <tr>
            <th></th>
            <th>Roles</th>
            
        </tr>
        <tr>
            <td>1</td>
            <td>Administrador</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Profesor</td>

        </tr>
        <tr>
            <td>3</td>
            <td>Estudiante</td>

        </tr>
        <tr>
            <td>4</td>
            <td>NA</td>

        </tr>
    </table>

    
    </div>


    <div class="col-6">
<table>
        <tr>
            <th></th>
            <th>Verificacion</th>
            
        </tr>
        <tr>
            <td>1</td>
            <td>No verificado</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Verificado</td>

        </tr>
        
    </table>
    </div>

 
    <div class="col-12">
<h1>Listado de Usuarios</h1>
    <form class="row g-3 needs-validation crear_tutoria" method="POST" novalidate>
    <table>
        <tr>
            <th>CI</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Verificacion</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                <td><input type="text" disabled name="ci" value="<?php echo $usuario->getCi(); ?>"></td>
        <!-- Agrega un campo oculto para almacenar el valor de ci -->
        <td><input type="hidden" name="ci_eliminar" value="<?php echo $usuario->getCi(); ?>"></td>
                    <td><?php echo $usuario->getCorreo(); ?></td>
                    <td><?php echo $usuario->getName(); ?></td>
                    <td><?php echo $usuario->getVerifiacion(); ?></td>
                    <td><?php echo $usuario->getId_cargo(); ?></td>
                    <td>
                        <a class="btn btn-primary" href="adminEditarUsuarios.php?ci=<?php echo $usuario->getCi(); ?>">Editar</a>
                        <input class="btn btn-danger" type="submit" name="eliminar" value="eliminar">
                </td>
                </tr>
        <?php } ?>
    </table>
    </form>
    </div>


    
</div>






    <div class="col-6">
    <form action="view/home/crearUsuario.php" class="g-3 needs-validation  crear_tutoria" novalidate method="POST">
    <h1 class="text-center">Alta de Usuarios</h1>
    <div class="container">
        <div class="row">


            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="valid-feedback">
                    Ok!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
                <div class="valid-feedback">
                    Ok!
                </div>
             </div>

             <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Cedula de Identidad</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="ci" name="ci" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                     Por favor ingrese su CI.
                </div>
                </div>
             </div>





             <div class="col-md-5">
                <label for="validationCustomUsername" class="form-label">Verificacion</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="veri" name="veri" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                     Por favor ingrese 1 si el usuario no esta verificado o 2 si esta verificado.
                </div>
                </div>
             </div>


             <div class="col-md-5">
                <label for="validationCustomUsername" class="form-label">Rol</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="rol" name="rol" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                     Por favor ingrese 1 si el usuario no esta verificado o 2 si esta verificado.
                </div>
                </div>
             </div>

             <div class="correo col-md-4">
                <label for="validationCustom05" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" id="validationCustom05" value="<?= (!empty($_GET["correo"])) ? $_GET["correo"] : "" ?>" placeholder="name@example.com">
                
            </div>


            <div class="contra col-md-4">
                    <div class="box-eye">
                        <button type="button" onclick="mostrarContrasenia('password', 'eyePassword')">
                            <i id="eyePassword" class="fa-eye">s</i>
                        </button>
                    </div>
                    <label for="validationCustom06" class="form-label">Contraseña</label>
                    <input type="password" id="contra" class="form-control" name="contra" value="<?= (!empty($_GET["contraseña"])) ? $_GET["contraseña"] : "" ?>">

            </div>

            <div class="contra col-md-4">
                    <div class="box-eye">
                        <button type="button" onclick="mostrarContrasenia('password2', 'eyePassword2')">
                            <i id="eyePassword2" class="fa-eye">s</i>
                        </button>
                    </div>
                    <label for="validationCustom06" class="form-label">Verificar Contraseña</label>

                    <input type="password" id="contraDos" class="form-control" name="contraDos" value="<?= (!empty($_GET["confirmarContraseña"])) ? $_GET["confirmarContraseña"] : "" ?>"  >

            </div>


            

            <?php if (!empty($_GET["error"])): ?>
                    <div id="alertError" class="alert alert-danger mb-2" role="alert" style="margin=auto;">
                    <?= !empty($_GET["error"]) ? $_GET["error"] : "" ?>

                    </div>
            <?php endif; ?>


            <div class="col-12">
            
            <button type="submit">Crear Usuario</button>
            </div>
        </div>
    </div>


</form>
    </div>


    <br>
         


</div>






</div>




 

  
</body>
</html>
