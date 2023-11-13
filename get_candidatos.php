<?php
// Incluye el archivo de conexión
include 'conexion.php';

// Obtiene la conexión a la base de datos
$conexion = obtenerConexion();

// Consulta para obtener las opciones
$query = "SELECT id_candidato, nombre FROM candidatos LIMIT 10;";
$statement = $conexion->prepare($query);
$statement->execute();
$options = $statement->fetchAll(PDO::FETCH_ASSOC);

// Devuelve las opciones como JSON
echo json_encode($options);
?>
