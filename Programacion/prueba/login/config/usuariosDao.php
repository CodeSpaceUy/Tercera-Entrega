<?php

include "db.php";
include($_SERVER['DOCUMENT_ROOT'] . '/login/entidades/usuario.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/entidades/curso.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/entidades/periodo.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/entidades/tutoria.php');
include($_SERVER['DOCUMENT_ROOT'] . '/login/entidades/solicitudTutoria.php');




class usuarioDao extends db
{
    protected static $cnx;

    public static function getconexion()
    {
        self::$cnx = db::conexion();
    }

    public function desconectar()
    {
        self::$cnx = null;
    }

    // En tu clase usuarioDao (usuariosDao.php)

// En tu clase usuarioDao (usuariosDao.php)

// En tu clase usuarioDao (usuariosDao.php)

public static function obtenerUsuarioPorCiL($ci)
{
    self::getconexion();
    $query = "SELECT * FROM usuarios WHERE ci = :ci";
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":ci", $ci);
    $resultado->execute();
    
    // Obtén el usuario como un objeto de la clase Usuarios
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    
    if ($fila) {
        $usuario = new Usuarios();
        $usuario->setCi($fila['ci']);
        $usuario->setCorreo($fila['correo']);
        $usuario->setName($fila['name']);
        $usuario->setSurname($fila['surname']);
        $usuario->setPassword($fila['password']);
        $usuario->setVerifiacion($fila['verificacion']);
        $usuario->setId_cargo($fila['id_cargo']);
    
        return $usuario;
    } else {
        return null; // Usuario no encontrado
    }
}








    public static function guardarUsuario($usuario)
    {
        $query = "INSERT INTO usuarios (ci, correo, name, surname, password, verificacion, id_cargo) VALUES (:ci, :correo, :name, :surname, :password, :verificacion, :id_cargo)";
        self::getconexion();
    
        $ciValue = $usuario->getCi();
        $correoValue = $usuario->getCorreo();
        $nameValue = $usuario->getName();
        $surnameValue = $usuario->getSurname();
        $passwordValue = $usuario->getPassword();
        $verificacionValue = "1";
        $id_cargoValue = "4" ; // Asigna el valor 4 a id_cargo
    
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":ci", $ciValue);
        $resultado->bindParam(":correo", $correoValue);
        $resultado->bindParam(":name", $nameValue);
        $resultado->bindParam(":surname", $surnameValue);
        $resultado->bindParam(":password", $passwordValue);
        $resultado->bindParam(":verificacion", $verificacionValue);
        $resultado->bindParam(":id_cargo", $id_cargoValue); // Asigna el valor de id_cargo
    
        return $resultado->execute(); // Devuelve true si se ejecuta correctamente
    }
    

    public function obtenerTodosLosUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        self::getconexion();
    
        $resultado = self::$cnx->query($query);
    
        $usuarios = array();
    
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuarios();
            $usuario->setCi($fila['ci']);
            $usuario->setCorreo($fila['correo']);
            $usuario->setName($fila['name']);
            $usuario->setSurname($fila['surname']);
            $usuario->setPassword($fila['password']);
            $usuario->setVerifiacion($fila['verificacion']);
            $usuario->setId_cargo($fila['id_cargo']);
    
            $usuarios[] = $usuario;
        }
    
        return $usuarios;
    }

    public function obtenerUsuarioPorCi($ci)
{
    $query = "SELECT * FROM usuarios WHERE ci = :ci";
    self::getconexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":ci", $ci);
    $resultado->execute();

    if ($resultado->rowCount() > 0) {
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);

        $usuario = new Usuarios();
        $usuario->setCi($fila['ci']);
        $usuario->setCorreo($fila['correo']);
        $usuario->setName($fila['name']);
        $usuario->setSurname($fila['surname']);
        $usuario->setPassword($fila['password']);
        $usuario->setVerifiacion($fila['verificacion']);
        $usuario->setId_cargo($fila['id_cargo']);

        return $usuario;
    } else {
        return null; // Usuario no encontrado
    }
}

    

public static function actualizarUsuario($usuario)
{
    $query = "UPDATE usuarios SET correo = :correo, name = :name, surname = :surname, verificacion = :verificacion, id_cargo = :id_cargo WHERE ci = :ci";
    self::getconexion();

    $ciValue = $usuario->getCi();
    $correoValue = $usuario->getCorreo();
    $nameValue = $usuario->getName();
    $surnameValue = $usuario->getSurname();
    $verificacionValue = $usuario->getVerifiacion();
    $idCargoValue = $usuario->getId_cargo();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":ci", $ciValue);
    $resultado->bindParam(":correo", $correoValue);
    $resultado->bindParam(":name", $nameValue);
    $resultado->bindParam(":surname", $surnameValue);
    $resultado->bindParam(":verificacion", $verificacionValue);
    $resultado->bindParam(":id_cargo", $idCargoValue);

    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}



public function obtenerTodosLosCursos()
{
    $query = "SELECT * FROM curso";
    self::getconexion();

    $resultado = self::$cnx->query($query);

    $cursos = array(); // Cambio de $curso a $cursos

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $curso = new Cursos();
        $curso->setId($fila['id']);
        $curso->setNombre($fila['nombre']);

        $cursos[] = $curso; // Almacenar cada objeto en el array $cursos
    }

    return $cursos; // Devolver el array $cursos
}

public function obtenerTodosLosPeriodos()
{
    $query = "SELECT * FROM periodo";
    self::getconexion();

    $resultado = self::$cnx->query($query);

    $periodos = array(); // Cambio de $curso a $cursos

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $periodo = new Cursos();
        $periodo->setId($fila['id']);
        $periodo->setNombre($fila['nombre']);

        $periodos[] = $periodo; // Almacenar cada objeto en el array $cursos
    }

    return $periodos; // Devolver el array $cursos
}



public function obtenerTodosLosEstudiantes()
{
    $query = "SELECT * FROM usuarios WHERE id_cargo = 3"; // Filtra por id_cargo = 3
    self::getconexion();

    $resultado = self::$cnx->query($query);

    $usuarios = array();

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $usuario = new Usuarios();
        $usuario->setCi($fila['ci']);
        $usuario->setCorreo($fila['correo']);
        $usuario->setName($fila['name']);
        $usuario->setSurname($fila['surname']);
        $usuario->setPassword($fila['password']);
        $usuario->setVerifiacion($fila['verificacion']);
        $usuario->setId_cargo($fila['id_cargo']);

        $usuarios[] = $usuario;
    }

    return $usuarios;
}

public function obtenerTodosLosProfesores()
{
    $query = "SELECT * FROM usuarios WHERE id_cargo = 2"; // Filtra por id_cargo = 2
    self::getconexion();

    $resultado = self::$cnx->query($query);

    $usuarios = array();

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $usuario = new Usuarios();
        $usuario->setCi($fila['ci']);
        $usuario->setCorreo($fila['correo']);
        $usuario->setName($fila['name']);
        $usuario->setSurname($fila['surname']);
        $usuario->setPassword($fila['password']);
        $usuario->setVerifiacion($fila['verificacion']);
        $usuario->setId_cargo($fila['id_cargo']);

        $usuarios[] = $usuario;
    }

    return $usuarios;
}

public static function existeProfesor($idProfe)
{
    $query = "SELECT id_profesor FROM profesor WHERE id_profesor = :id_profesor";
    self::getconexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id_profesor", $idProfe);
    $resultado->execute();

    return $resultado->rowCount() > 0;
}


public static function crearTutoria($tutoria)
{
    $query = "INSERT INTO tutoria (id_profe, nombre, curso, periodo, fecha_inicio, fecha_fin, hora, comentarios, activa) VALUES (:id_profe, :nombre, :curso, :periodo, :fecha_inicio, :fecha_fin, :hora, :comentarios, :activa)";
    self::getconexion();

    $idProfe = $tutoria->getIdProfe();
    $nombre = $tutoria->getNombre();
    $curso = $tutoria->getCurso();
    $periodo = $tutoria->getPeriodo();
    $fechaInicio = $tutoria->getFechaInicio();
    $fechaFin = $tutoria->getFechaFin();
    $hora = $tutoria->getHora();
    $comentarios = $tutoria->getComentarios();
    $activa = 1; // Asegúrate de que esté correctamente configurada en tu objeto $tutoria

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id_profe", $idProfe);
    $resultado->bindParam(":nombre", $nombre);
    $resultado->bindParam(":curso", $curso);
    $resultado->bindParam(":periodo", $periodo);
    $resultado->bindParam(":fecha_inicio", $fechaInicio);
    $resultado->bindParam(":fecha_fin", $fechaFin);
    $resultado->bindParam(":hora", $hora);
    $resultado->bindParam(":comentarios", $comentarios);
    $resultado->bindParam(":activa", $activa);

    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}

public static function obtenerTutorias()
{
    self::getConexion();

    $query = "SELECT id, nombre, curso, hora, periodo, comentarios FROM tutoria";

    $resultado = self::$cnx->query($query);

    $tutorias = array();

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $tutoria = new Tutorias();
        $tutoria->setId($row['id']);
        $tutoria->setNombre($row['nombre']);
        $tutoria->setCurso($row['curso']);
        $tutoria->setHora($row['hora']);
        $tutoria->setPeriodo($row['periodo']);
        $tutoria->setComentarios($row['comentarios']);
        
        $tutorias[] = $tutoria;
    }

    return $tutorias;
}





// En tu clase usuarioDao (usuariosDao.php)


public static function obtenerTutoriaPorId($id)
{
    self::getconexion();
    $query = "SELECT * FROM tutoria WHERE id = :id";
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    $resultado->execute();
    
    // Obtén la tutoría como un objeto de la clase Tutorias
    $tutoria = $resultado->fetch(PDO::FETCH_OBJ);
    
    // Verifica si se encontró la tutoría
    if ($tutoria) {
        // Crea un objeto de la clase Tutorias y asigna los valores de la consulta
        $tutoriaObj = new Tutorias();
        $tutoriaObj->setIdprofe($tutoria->id_profe);
        $tutoriaObj->setNombre($tutoria->nombre);
        $tutoriaObj->setCurso($tutoria->curso);
        $tutoriaObj->setPeriodo($tutoria->periodo);
        $tutoriaObj->setFechainicio($tutoria->fecha_inicio);
        $tutoriaObj->setFechafin($tutoria->fecha_fin);
        $tutoriaObj->setHora($tutoria->hora);
        $tutoriaObj->setComentarios($tutoria->comentarios);
        $tutoriaObj->setActiva($tutoria->activa);
        
        return $tutoriaObj;
    } else {
        // No se encontró la tutoría
        return null;
    }
}



public static function actualizarTutoria($tutoria)
{
    self::getconexion();
    $query = "UPDATE tutoria SET
              nombre = :nombre,
              curso = :curso,
              periodo = :periodo,
              fecha_inicio = :fecha_inicio,
              fecha_fin = :fecha_fin,
              hora = :hora,
              comentarios = :comentarios
              WHERE id = :id"; 
    
    $resultado = self::$cnx->prepare($query);
    
    $id = $tutoria->getId(); // Mantenemos el mismo ID

    $nombre = $tutoria->getNombre();
    $curso = $tutoria->getCurso();
    $periodo = $tutoria->getPeriodo();
    $fechaInicio = $tutoria->getFechaInicio();
    $fechaFin = $tutoria->getFechaFin();
    $hora = $tutoria->getHora();
    $comentarios = $tutoria->getComentarios();
    
    $resultado->bindParam(":id", $id);
    $resultado->bindParam(":nombre", $nombre);
    $resultado->bindParam(":curso", $curso);
    $resultado->bindParam(":periodo", $periodo);
    $resultado->bindParam(":fecha_inicio", $fechaInicio);
    $resultado->bindParam(":fecha_fin", $fechaFin);
    $resultado->bindParam(":hora", $hora);
    $resultado->bindParam(":comentarios", $comentarios);
    
    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}


public static function eliminarTutoria($id)
{
    self::getconexion();
    $query = "DELETE FROM tutoria WHERE id = :id";
    
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    
    try {
        $resultado->execute();
        return true; // Devuelve true si se elimina correctamente
    } catch (PDOException $e) {
        // Manejo de errores, puedes personalizar esto según tus necesidades
        echo "Error al eliminar la tutoría: " . $e->getMessage();
        return false;
    }
}


public function eliminarUsuarioPorCi($ci) {
    self::getconexion();
    $query = "DELETE FROM usuarios WHERE ci = :ci";
    
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":ci", $ci, PDO::PARAM_STR); // Asegúrate de usar PDO::PARAM_STR
    
    try {
        $resultado->execute();
        return true; // Devuelve true si se elimina correctamente
    } catch (PDOException $e) {
        // Manejo de errores, puedes personalizar esto según tus necesidades
        echo "Error al eliminar el usuario: " . $e->getMessage();
        return false;
    }
}


public static function login($txtUsuario, $txtPassword) {
    try {
        self::getconexion();
        
        // Preparar la consulta SQL para verificar las credenciales
        $query = "SELECT id_cargo FROM usuarios WHERE ci = :ci AND password = :password";
        $stmt = self::$cnx->prepare($query);
        $stmt->bindParam(":ci", $txtUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $txtPassword, PDO::PARAM_STR);
        $stmt->execute();
        
        // Verificar si las credenciales son válidas
        if ($stmt->rowCount() > 0) {
            // Las credenciales son correctas, obtener el id_cargo del usuario
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_cargo'];
        } else {
            // Las credenciales son incorrectas
            return false;
        }
    } catch (PDOException $e) {
        // Manejo de errores, puedes personalizar esto según tus necesidades
        echo "Error en la conexión o consulta: " . $e->getMessage();
        return false;
    }
}



public static function obtenerTutoriasFechaHora() {
    self::getConexion();

    $query = "SELECT id, nombre, curso, fecha_inicio, fecha_fin, hora, periodo, comentarios, archivo FROM tutoria";

    $resultado = self::$cnx->query($query);

    $tutorias = array();

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $tutoria = new Tutorias();
        $tutoria->setId($row['id']);
        $tutoria->setNombre($row['nombre']);
        $tutoria->setCurso($row['curso']);
        $tutoria->setFechaInicio($row['fecha_inicio']);
        $tutoria->setFechaFin($row['fecha_fin']);
        $tutoria->setHora($row['hora']);
        $tutoria->setPeriodo($row['periodo']);
        $tutoria->setComentarios($row['comentarios']);
        $tutoria->setArchivo($row['archivo']); // Agregar la ruta del archivo

        $tutorias[] = $tutoria;
    }

    return $tutorias;
}



public static function unirse($idUsuario, $idTutoria, $diaTutoria, $observaciones, $horaTutoria)
{
    $query = "INSERT INTO alumnos_tutoria (id_alumno, id_tutoria, diaTutoria, observaciones, horaTutoria) VALUES (:id_alumno, :id_tutoria, :diaTutoria, :observaciones, :horaTutoria)";
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id_alumno", $idUsuario);
    $resultado->bindParam(":id_tutoria", $idTutoria);
    $resultado->bindParam(":diaTutoria", $diaTutoria);
    $resultado->bindParam(":observaciones", $observaciones);
    $resultado->bindParam(":horaTutoria", $horaTutoria);

    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}




public static function solicitarTutoria($idSolicitud, $asunto, $CI, $curso, $periodo, $comentarios)
{
    $query = "INSERT INTO solicitudtutoria (idSolicitud, asunto, CI, curso, periodo, comentarios) VALUES (:idSolicitud, :asunto, :CI, :curso, :periodo, :comentarios)";
    
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":idSolicitud", $idSolicitud);
    $resultado->bindParam(":asunto", $asunto);
    $resultado->bindParam(":CI", $CI);
    $resultado->bindParam(":curso", $curso);
    $resultado->bindParam(":periodo", $periodo);
    $resultado->bindParam(":comentarios", $comentarios);


    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}




    // ...

    public static function obtenerTutoriasEstudiante()
{
    self::getConexion();

    $query = "SELECT idSolicitud, asunto, CI, curso, periodo, comentarios FROM solicitudtutoria";

    $resultado = self::$cnx->query($query);

    $tutorias = array();

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $tutoria = new STutorias();
        $tutoria->setIdSolicitud($row['idSolicitud']);
        $tutoria->setAsunto($row['asunto']);
        $tutoria->setCI($row['CI']);
        $tutoria->setCurso($row['curso']);
        $tutoria->setPeriodo($row['periodo']);
        $tutoria->setComentarios($row['comentarios']);
        
        $tutorias[] = $tutoria;
    }

    return $tutorias;
}



public static function crearCurso($id, $nombre)
{
    $query = "INSERT INTO curso (id, nombre) VALUES (:id, :nombre)";
    
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    $resultado->bindParam(":nombre", $nombre);


    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}


public static function eliminarCurso($id)
{
    self::getconexion();
    $query = "DELETE FROM curso WHERE id = :id";
    
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    
    try {
        $resultado->execute();
        return true; // Devuelve true si se elimina correctamente
    } catch (PDOException $e) {
        // Manejo de errores, puedes personalizar esto según tus necesidades
        echo "Error al eliminar la tutoría: " . $e->getMessage();
        return false;
    }
}


public static function crearPeriodo($id, $nombre)
{
    $query = "INSERT INTO periodo (id, nombre) VALUES (:id, :nombre)";
    
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    $resultado->bindParam(":nombre", $nombre);


    return $resultado->execute(); // Devuelve true si se ejecuta correctamente
}

public static function eliminarPeriodo($id)
{
    self::getconexion();
    $query = "DELETE FROM periodo WHERE id = :id";
    
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id", $id);
    
    try {
        $resultado->execute();
        return true; // Devuelve true si se elimina correctamente
    } catch (PDOException $e) {
        // Manejo de errores, puedes personalizar esto según tus necesidades
        echo "Error al eliminar la tutoría: " . $e->getMessage();
        return false;
    }
}



}
?>