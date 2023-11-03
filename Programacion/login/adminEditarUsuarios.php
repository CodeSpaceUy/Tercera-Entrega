<?php
include 'C:\xampp\htdocs\login\config\usuariosDao.php';

$objUsuarioDao = new usuarioDao(); // Instancia de usuarioDao

if (isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $usuario = $objUsuarioDao->obtenerUsuarioPorCi($ci);

    if ($usuario === null) {
        // Usuario no encontrado, puedes manejar el caso según tus necesidades
    }
}

if (isset($_POST['actualizar'])) {
    if ($usuario !== null) {
        $usuario->setCorreo($_POST['correo']);
        $usuario->setName($_POST['name']);
        $usuario->setSurname($_POST['surname']);
        $usuario->setVerifiacion($_POST['Verificacion']);
        $usuario->setId_cargo($_POST['rol']);

        if ($objUsuarioDao->actualizarUsuario($usuario)) {
            // Actualización exitosa, puedes redireccionar a la página de listado o mostrar un mensaje de éxito
            header("Location: adminListarUsuarios.php"); // Cambia "lista_usuarios.php" por la página deseada
            exit; // Importante: detener la ejecución del script después de redireccionar
        } else {
            // Error en la actualización, maneja el caso según tus necesidades
        }
    } else {
        // Usuario no encontrado, maneja el caso según tus necesidades
    }
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
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



    <h1>Editar Usuario</h1>
    <?php if ($usuario !== null) { ?>
        <form method="POST">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo $usuario->getCorreo(); ?>"><br>
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?php echo $usuario->getName(); ?>"><br>
            <label for="surname">Apellido:</label>
            <input type="text" name="surname" value="<?php echo $usuario->getSurname(); ?>"><br>
            <label for="Verificacion">Verificacion:</label>
            <input type="text" name="Verificacion" value="<?php echo $usuario->getVerifiacion(); ?>"><br>
            <label for="rol">Rol:</label>
            <input type="text" name="rol" value="<?php echo $usuario->getId_cargo(); ?>"><br>
            <input type="submit" name="actualizar" value="Actualizar">
        </form>
    <?php } else { ?>
        <p>Usuario no encontrado.</p>
    <?php } ?>
</body>
</html>
