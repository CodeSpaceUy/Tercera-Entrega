<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tutoria = $_POST["id_tutoria"];

    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        $archivo_nombre = $_FILES["archivo"]["name"];
        $archivo_temp = $_FILES["archivo"]["tmp_name"];
        $archivo_destino = "files/" . $archivo_nombre; // Cambia la carpeta a tu directorio de almacenamiento

        if (move_uploaded_file($archivo_temp, $archivo_destino)) {
            $conexion = new mysqli("localhost", "root", "", "tutoria");

            if ($conexion->connect_error) {
                die("Error de conexión a la base de datos: " . $conexion->connect_error);
            }

            $sql = "UPDATE Tutoria SET archivo = ? WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("si", $archivo_destino, $id_tutoria);

            if ($stmt->execute()) {
                // El archivo se subió y se asoció a la tutoría específica
                header("Location: profesor.php"); // Redirige a la página principal o a donde desees
            } else {
                echo "Error al actualizar la base de datos";
            }

            $stmt->close();
            $conexion->close();
        } else {
            echo "Error al subir el archivo";
        }
    }
}
?>
