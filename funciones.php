<?php
include 'conexion.php';

function estaRegistrado($rut) {
    try {
        // Obtener la conexión a la base de datos
        $conexion = obtenerConexion();

        // Preparar la consulta SQL
        $consulta = $conexion->prepare("SELECT id_votacion FROM votaciones WHERE rut = :rut");
        $consulta->bindParam(':rut', $rut, PDO::PARAM_STR);
        $consulta->execute();
        
        // Obtener el resultado
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Cerrar la conexión a la base de datos
        $conexion = null;

        // Devolver true si el registro existe, false si no existe
        return $resultado !== false;
    } catch (PDOException $e) {
        // Manejar el error de conexión
        echo "Error al verificar si está registrado: " . $e->getMessage();
        return false;
    }
}
?>
