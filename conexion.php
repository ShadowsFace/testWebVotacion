<?php

function obtenerConexion() {
    $host = "localhost";
    $dbname = "testweb_votacion";
    $usuario = "testWeb";
    $contrasena = "testWeb";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);
        // Configura el modo de error PDO para que lance excepciones
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        // Lanza la excepción para que pueda ser manejada por el código que llama
        throw new Exception("Error de conexión: " . $e->getMessage());
    }
}

?>
