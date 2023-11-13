<?php
// Incluye el archivo de conexión
include 'conexion.php';

// Obtiene la conexión a la base de datos
$conexion = obtenerConexion();

// Consulta para obtener las categorías
$query = "SELECT id, nombre FROM regiones;";
$statement = $conexion->prepare($query);
$statement->execute();
$categorias = $statement->fetchAll(PDO::FETCH_ASSOC);

// Devuelve las categorías como JSON
echo json_encode($categorias);
